<?php

namespace App\Http\Controllers;

use App\Repositories\Eloquent\PostRepository;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function __construct(
        public PostRepository $postRepository,
    ) {}
    public function feed_rss()
    {
        $posts = $this->postRepository->getAll([
            'is_status' => 1,
            'type' => 'brand',
        ], ['order_by' => ['publish_at', 'desc'], 'limit' => 200]);
        return response()->view('front_end.sitemap.rss', ['data' => $posts])->header('Content-Type', 'text/xml');
    }
    public function pinterestxxx()
    {
        $posts = $this->postRepository->getAll([
            'is_status' => 1,
            'type' => 'brand',
        ], ['order_by' => ['publish_at', 'desc'], 'limit' => 200]);
        return response()->view('front_end.sitemap.pinterestxxx', ['data' => $posts])->header('Content-Type', 'text/xml');
    }
    public function rssxxx()
    {
        $posts = $this->postRepository->getAll([
            'is_status' => 1,
            'type' => 'brand',
        ], ['order_by' => ['publish_at', 'desc'], 'limit' => 200]);
        return response()->view('front_end.sitemap.rssxxx', ['data' => $posts])->header('Content-Type', 'text/xml');
    }
}
