<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Comment;
use App\Models\Drag;
use App\Models\Page;
use App\Models\PageDetail;
use App\Models\Post;
use App\Models\Redirect;
use App\Repositories\Eloquent\BannerRepository;
use App\Repositories\Eloquent\CategoryRepository;
use App\Repositories\Eloquent\CommentRepository;
use App\Repositories\Eloquent\PageRepository;
use App\Repositories\Eloquent\PostRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    protected $model_tag;
    protected $model_post;

    public function __construct(
        public CategoryRepository $categoryRepository,
        public PostRepository     $postRepository,
        public CommentRepository  $commentRepository,
        public BannerRepository   $bannerRepository,
        public PageRepository     $pageRepository
    ) {}

    public function dashboard(Request $request)
    {

        // get sản phẩm bestseller config từ admin:
        $data = [];
        $page = $request->page ?? 1;
        $data['posts']  = $this->postRepository->getAll([
            'is_status' => 1,
            'type' => 'brand'
        ], [
            'order_by' => ['publish_at', 'desc'],
            'with' => ['category'],
            'limit' => 30,
            'pagination' => $page,
            'select' => ['id', 'title', 'slug', 'thumbnail', 'category_id', 'address', 'email', 'phone', 'description', 'publish_at'],
        ]); 
        $data['categories']  = $this->categoryRepository->getAll([
            'is_status' => 1,
            'type' => 'home'
        ], [
            'order_by' => ['id', 'asc'],
            'limit' => 20,
            'pagination' => $page,
            'select' => ['id', 'title', 'slug', 'thumbnail', 'description'],
        ]);
        $data['banners'] = Banner::getType('home');
        return view('theme_brand.theme_1.home', $data);
    }

    public function post($slug, $id = 0)
    {
        $post = $this->postRepository->findByField('slug', $slug)->first();
        if (empty($post) || $post->is_status != 1) return abort(404);
        $medias = $post->media()->select(['position', 'type', 'thumbnail'])->get()->groupBy('type');
       
        $SEO = [
            'title' => $post->meta_title,
            'meta_title' => $post->meta_title,
            'meta_description' => $post->meta_description,
            // 'meta_description' => str_replace('[text]',   $post->meta_title, $promat),
            'meta_keyword' => $post->title ?? '',
            'is_robot' => $post->is_robot ?? 0,
            'image' => $post->thumbnail ?? config('data.cms_setting.logo'),

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
            $SEO['favicon'] =   getImageThumb($post->thumbnail, 100, 100);
            $data['relates'] = Post::where([
                'type' => 'brand',
                'is_status' => 1,
            ])->where('publish_at', '>', $post->publish_at)->orderBy('publish_at', 'asc')->limit(7)->get();


            $data['comments'] = Comment::where([
                'type' => 'post',
                // 'is_content' => 1,
                'is_status' => 1,
                'data_id' => $post->id
            ])->limit(5)->get();
        }
        $view = $post->type == 'top_list' ? 'theme_brand.theme_1.topList' : 'theme_brand.theme_1.brand';
        return view($view, $data);
    }

    public function menu($slug, $id = 0)
    {
        $post = $this->postRepository->findByField('slug', $slug)->first();

        if (empty($post) || $post->is_status != 1) return abort(404);

        $promat = env('META_DES');
        $SEO = [
            'title' => __('config_data.pages.menus.menu') . ' - ' . $post->title,
            'meta_title' => __('config_data.pages.menus.menu') . ' - ' . $post->title,
            'meta_description' =>  str_replace('[text]',   $post->meta_title, $promat),
            'meta_keyword' => __('config_data.pages.menus.menu') . ' ' . $post->title ?? '',
            'is_robot' => $post->is_robot ?? 0,
            'image' => $post->thumbnail ?? config('data.cms_setting.logo'),
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

        if (empty($post) || $post->is_status != 1) return abort(404);

        $datas = [
            [
                'url' => route('post', [$post->slug]),
                'title' => $post->title,
                'public_at' => $post->updated_at,
            ],
            // [
            //     'url' => route('menu', [$post->slug]),
            //     'title' => __('config_data.pages.menus.menu') . ' ' . $post->title,
            //     'public_at' => $post->updated_at,
            // ]
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
        if (empty($search)) return redirect('/');
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

        if (empty($page) || $page->is_status != 1) return abort(404);

        $SEO = [
            'title' => $page->meta_title ?? '',
            'meta_title' => $page->meta_title ?? '',
            'meta_description' => $page->meta_description ?? '',
            'meta_keyword' => $page->meta_title ?? '',
            'is_robot' => $page->is_robot ?? 0,
            'image' => $page->thumbnail ?? config('data.cms_setting.logo'),
            'url' => route('page', ['slug' => $page->slug]),
        ];

        $view = $page->layout ?? 'front_end.page';
        return view($view, ['row' => $page, 'SEO' => $SEO ?? [],]);
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
