<?php
return [
    'limit_paginate_admin' => 10,
    'config_menu' => [
        'Header',
        'Header_sidebar',
        'Footer',
        'FooterSocial',
    ],
    'cms_setting' => [
        'icon' => '/assets/images/prabez-favicon.png',
        'logo' => ''
    ],
    'config_trending' => [
        ['key' => 'config_category_home_hot', 'module' => 'category', 'text' => 'Quản lý danh mục sản phẩm nổi bật trang chủ', 'query' => ['type' => 'product']],
        ['key' => 'config_category_home', 'module' => 'category', 'text' => 'Quản lý danh mục sản phẩm hiển thị trang chủ', 'query' => ['type' => 'product']],
        ['key' => 'config_category_post_home', 'module' => 'category', 'text' => 'Quản lý danh mục bài viết hiển thị trang chủ', 'query' => ['type' => 'post']],
        ['key' => 'config_category_trending', 'module' => 'category', 'text' => 'Quản lý danh mục sản phẩm ưa chuộng', 'query' => ['type' => 'product']],

        ['key' => 'product_sale_home', 'module' => 'product', 'text' => 'Quản lý product home sale'],
        ['key' => 'product_trending_home', 'module' => 'product', 'text' => 'Quản lý product home'],

        ['key' => 'post_trending_home', 'module' => 'post', 'text' => 'Quản lý bài viết trang chủ', 'query' => []],
        ['key' => 'post_trending', 'module' => 'post', 'text' => 'Quản lý bài viết nổi bật', 'query' => []],

    ],
    'banner_type' => [
        'home' => 'Trang chủ'
    ],
    'setting_menu' => [
        0 => 'Menu Header',
        1 => 'Menu Footer',
    ],
    'config_drags' => [
        'config_post_home' => "Quản lý bài viết trang chủ (banner)",
        'config_product_home' => "Quản lý sản phẩm trang chủ (banner)",
        'config_category_home' => "Quản lý danh mục trang chủ (category)"
    ],
    'currency' => "VNĐ",
    'status' => [
        0 => ['title' => 'Chờ duyệt', 'class' => "badge badge-warning"],
        1 => ['title' => 'Đã xuất bản', 'class' => "badge badge-success"],
        2 => ['title' => 'Mới cào', 'class' => "badge badge-primary"],
        3 => ['title' => 'Chờ cào', 'class' => "badge badge-secondary"],
        4 => ['title' => 'Bị từ chối', 'class' => "badge badge-danger"],
    ],
    
    'status_crawler' => [
        0 => ['title' => 'Chờ crawler', 'class' => "badge badge-secondary"],
        1 => ['title' => 'Chờ đồng bộ', 'class' => "badge badge-warning"],
        2 => ['title' => 'Thành công', 'class' => "badge badge-success"],
    ],

];
