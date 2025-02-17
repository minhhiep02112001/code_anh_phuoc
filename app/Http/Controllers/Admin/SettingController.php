<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public $config = [
        'config_website',
        'config_seo',
        'config_home',
        'config_social'
    ];

    function setting(Request $request)
    {
        $key_cache = "setting" . \Str::slug(env('APP_URL'));
        if ($request->method() == "POST") {
            $data = $request->only($this->config);

            foreach ($data as $key => $value) {
                try {
                    $value = is_array($value) ? json_encode($value) : $value;
                    DB::beginTransaction();
                    Setting::updateOrCreate(['key' => $key, 'domain' => env('APP_URL')], [
                        'value' => $value,
                        'title' => $key,
                        'key' => $key,
                        'domain' => env('APP_URL')
                    ]);
                    DB::commit();
                } catch (\Exception $ex) {
                    DB::rollBack();
                }
            }
            if (Cache::has($key_cache)) {
                Cache::forget($key_cache);
            }
            return $this->responsiveSuccess("Cập nhập thành công");
        }
        $settings = Setting::where('domain', env('APP_URL'))->select(['key', 'value'])->get()->toArray();
        $settings = array_combine(array_column($settings, 'key'),  array_column($settings, 'value'));

        if (!Cache::has($key_cache)) {
            Cache::put($key_cache, json_encode($settings), 365 * (24 * 60));
        }

        $data = [
            'setting' => $settings
        ];

        return view('admin.setting', $data);
    }
}
