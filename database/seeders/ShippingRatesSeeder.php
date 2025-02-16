<?php

namespace Database\Seeders;

use App\Models\Districts;
use App\Models\Provinces;
use App\Models\Shipping\Shipping;
use App\Models\Shipping\ShippingRate;
use App\Models\Wards;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShippingRatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Lấy tất cả các phương thức giao hàng
        $shippingMethods = Shipping::all();

        // Đặt mức giá cố định cho mỗi phương thức giao hàng
        $rates = [
            1 => 0,
        ];

        // Lấy tất cả các tỉnh
        $provinces = Provinces::all();

        foreach ($provinces as $province) {
            // Lấy tất cả các huyện thuộc tỉnh
            $districts = Districts::where('province_code', $province->code)->get();

            foreach ($districts as $district) {
                $wards = Wards::where('district_code', $district->code)->get();

                $data = [];
                foreach ($wards as $item) {
                    foreach ($shippingMethods as $method) {
                        // Thêm vào bảng shipping_rates
                        $data[] = [
                            'province_code' => $province->code,
                            'district_code' => $district->code,
                            'ward_code' => $item->code,
                            'shipping_method_id' => $method->id,
                            'rate' => $rates[$method->id]
                        ];
                    } 
                } 
                if (!empty($data)) ShippingRate::insert($data);
                echo "\n Done {$district->name}";
            }
        }
    }
}
