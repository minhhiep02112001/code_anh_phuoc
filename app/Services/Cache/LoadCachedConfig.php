<?php

namespace App\Services\Cache;

use Illuminate\Support\Facades\Cache;

class LoadCachedConfig
{
    private $key;

    public function __construct($key)
    {
        $this->key = $key;
    }

    public function load()
    {
        if (Cache::has('config_' . $this->key)) {
            return Cache::get('config_' . $this->key);
        } else {
            return Cache::rememberForever('config_' . $this->key, function () {
                $config = Config::where('unique_id', '=', $this->key)->first();
                return $config;
            });
        }
    }

    
}
