<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Redirect;
use App\Repositories\Eloquent\BannerRepository;
use App\Repositories\Eloquent\CategoryRepository;
use App\Repositories\Eloquent\CommentRepository;
use App\Repositories\Eloquent\PageRepository;
use App\Repositories\Eloquent\PostRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $model_tag;
    protected $model_post;

    public function __construct(
        public CategoryRepository $categoryRepository,
        public PostRepository $postRepository,
        public CommentRepository $commentRepository,
        public BannerRepository $bannerRepository,
        public PageRepository $pageRepository
    ) {}

    public function dashboard(Request $request)
    {

        // get sản phẩm bestseller config từ admin:
        $data = [];
        $page = $request->page ?? 1;
        $filterBrand = [
            // 'is_status' => 1,
            'type' => 'brand'
        ];

        $data['posts'] = $this->postRepository->getAll($filterBrand, [
            'order_by' => ['publish_at', 'desc'],
            'with' => ['category'],
            'limit' => 30,
            'pagination' => $page,
            'select' => ['id', 'title', 'slug', 'thumbnail', 'category_id', 'address', 'email', 'phone', 'description', 'publish_at'],
        ]);

        $data['categories'] = $this->categoryRepository->getAll([
            // 'is_status' => 1,
            'type' => 'home'
        ], [
            'order_by' => ['id', 'asc'],
            'limit' => 20,
            'pagination' => $page,
            'select' => ['id', 'title', 'slug', 'thumbnail', 'description'],
        ]);

        $data['banner'] = Banner::getType('home')->first();
        $data['exploreMore'] = Banner::getType('explore_more')->first();
        $data['bannerReview'] = Banner::getType('review_home');

        return view('front_end.home', $data);
    }

    public function post($slug, $id = 0)
    {
        $status = 0;
        $post = $this->postRepository->findByField('slug', $slug)->first();
        if (empty($post) || $post->is_status != $status) return abort(404);
        $medias = $post->media()->select(['position', 'type', 'thumbnail'])->get()->groupBy('type');

        $SEO = [
            'title' => $post->meta_title,
            'meta_title' => $post->meta_title,
            'meta_description' => $post->meta_description,
            'meta_keyword' => $post->title ?? '',
            'is_robot' => $post->is_robot ?? 0,
            'image' => $post->thumbnail ?? '',
            'url' => route('post', ['slug' => $post->slug]),
        ];

        $breadcrumbs = [array('url' => '', 'title' => $post->title)];

        $data = [
            'breadcrumbs' => $breadcrumbs,
            'post' => $post,
            'SEO' => $SEO,
            'medias' => $medias,
        ];

        if ($post->type == 'brand') {
            $data['SEO']['favicon'] = getImageThumb($post->favicon ?? $post->thumbnail, 100, 100);
            $relates = Post::where([
                'type' => 'brand',
                'is_status' => $status,
            ])->where(function ($q) use ($post) {
                if (!empty($post->publish_at)) return $q->where('publish_at', '<', $post->publish_at ?? '');
                return $q->where('created_at', '<', $post->created_at ?? '');
            })->orderBy(!empty($post->publish_at) ? 'publish_at' : 'created_at', 'desc')->limit(5)->get();

            $relates2 = Post::where([
                'type' => 'brand',
                'is_status' => $status,
            ])->where(function ($q) use ($post) {
                if (!empty($post->publish_at)) return $q->where('publish_at', '>', $post->publish_at ?? '');
                return $q->where('created_at', '>', $post->created_at ?? '');
            })->orderBy(!empty($post->publish_at) ? 'publish_at' : 'created_at', 'asc')->limit(5)->get();

            $data['relates'] = collect($relates2)->merge($relates)->sortBy(!empty($post->publish_at) ? 'publish_at' : 'created_at')->values()->all();
            
            $data['comments'] = $post->comment()->where([
                'type' => 'post',
            ])->limit(5)->get();
        }
        $view = $post->type == 'top_list' ? 'front_end.topList' : 'front_end.brand';
        return view($view, $data);
    }

    public function menu($slug, $id = 0)
    {
        $post = $this->postRepository->findByField('slug', $slug)->first();

        if (empty($post) || $post->is_status != 1)
            return abort(404);

        $promat = env('META_DES');
        $SEO = [
            'title' => __('config_data.pages.menus.menu') . ' - ' . $post->title,
            'meta_title' => __('config_data.pages.menus.menu') . ' - ' . $post->title,
            'meta_description' => str_replace('[text]', $post->meta_title, $promat),
            'meta_keyword' => __('config_data.pages.menus.menu') . ' ' . $post->title ?? '',
            'is_robot' => $post->is_robot ?? 0,
            'image' => $post->thumbnail ?? '',
            'url' => route('post', ['slug' => $post->slug]),
        ];

        $breadcrumbs = [array('url' => '', 'title' => $post->title)];

        $data = [
            'breadcrumbs' => $breadcrumbs,
            'post' => $post,
            'SEO' => $SEO,

        ];

        return view('theme_2.menu', $data);
    }


    public function sitemapBrand($slug)
    {
        $post = $this->postRepository->findByField('slug', $slug)->first();

        if (empty($post) || $post->is_status != 1)
            return abort(404);

        $datas = [
            [
                'url' => route('post', [$post->slug]),
                'title' => $post->title,
                'public_at' => $post->publish_at ?? $post->updated_at,
            ],
        ];
        $data = [
            'datas' => $datas
        ];
        return response()
            ->view('front_end.sitemap.sitemap_brand', $data)
            ->header('Content-Type', 'text/xml');
    }


    public function search(Request $request)
    {
        $search = $request->key ?? '';
        if (empty($search))
            return redirect('/');
        $limit = 20;
        $posts = $this->postRepository->getAll([
            'is_status' => 1,
            'title' => $search
        ], [
            'pagination' => $request->page ?? 1,
            'limit' => $limit,
            'select' => ['id', 'title', 'slug', 'thumbnail', 'address', 'description', 'created_at'],
            'order_by' => [$order_by ?? 'updated_at', $sort ?? 'desc']
        ]);

        $data = [
            'rows' => $posts,
            'value' => $search,
            'limit' => $limit
        ];
        return view('front_end.search', $data);
    }



    public function page(Request $request, $slug)
    {
        $page = $this->pageRepository->findByField('slug', $slug)->first();

        if (empty($page) || $page->is_status != 1)
            return abort(404);

        $SEO = [
            'title' => $page->meta_title ?? '',
            'meta_title' => $page->meta_title ?? '',
            'meta_description' => $page->meta_description ?? '',
            'meta_keyword' => $page->meta_title ?? '',
            'is_robot' => $page->is_robot ?? 0,
            'image' => $page->thumbnail ?? '',
            'url' => route('page', ['slug' => $page->slug]),
        ];

        $view = $page->layout ?? 'theme_brand.theme_1.page';
        return view($view, ['page' => $page, 'SEO' => $SEO ?? [],]);
    }

    public function redirect(Request $request)
    {
        return abort(404);
    }

    public function redirect301(Request $request, $slug)
    {
        $url = $request->url();
        $url = str_replace('http://', 'https://', $url);
        $link = Redirect::where('url_old', $url)->where('is_status', 1)->first();
        if (!empty($link)) {
            return redirect($link->url_new, 301);
        }
        return abort(404);;
    }
    private function redirectUrl($link, $request)
    {
        if (!empty($link->type)) {
            switch ($link->type) {
                // case 'category':
                //     return $this->category($request, $link->slug, $link->key_id);
                //     break;
                // case 'post':
                //     return $this->post($request, $link->slug);
                //     break;
                // case 'page':
                //     return $this->page($request, $link->slug);
                //     break;
                default:
                    return abort(404);
                    break;
            }
        }

        return abort(404);
    }
}
