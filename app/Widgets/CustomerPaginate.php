<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

class CustomerPaginate extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    
    protected $config = [
        'total' => 0,
        'page' => 0,
        'limit' => 60,
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        return view('widgets.customer_paginate', [
            'config' => $this->config,
        ]);
    }
}
