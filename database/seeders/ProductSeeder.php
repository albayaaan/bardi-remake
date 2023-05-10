<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'category_id' => 2,
                'product_name' => 'Light Bulb Bluetooth 9W – RGBWW',
                'description' => 'BARDI BT 9W RGBWW Bulb merupakan sebuah bohlam pintar yang dapat dihidupkan atau dimatikan, diubah warna, dan diatur tingkat kecerahannya melalui aplikasi BARDI Smart Home, selama lampu terhubung ke Bluetooth.',
                'price' => 84000,
                'product_image' => 'https://bardi.co.id/wp-content/uploads/2021/09/9W-RGBWW-Bluetooth-Bulb.png'
            ],
            [
                'category_id' => 2,
                'product_name' => 'Light Bar with NFC',
                'description' => 'BARDI Light Bar with NFC ini merupakan salah satu produk lighting terbaru dari BARDI yang dapat dihidupkan atau dimatikan, diubah warna, dan diatur tingkat kecerahannya melalui aplikasi BARDI Smart Home, selama device terhubung ke WiFi/hotspot dan bluetooth.Bisa juga dengan NFC 1 TAP Pairing.',
                'price' => 693000,
                'product_image' => 'https://bardi.co.id/wp-content/uploads/2022/11/Light-Bar-2.png'
            ],
            [
                'category_id' => 1,
                'product_name' => 'IP Camera Indoor PTZ (Lite Version)',
                'description' => 'IP Camera Indoor PTZ (Lite Version) merupakan kamera pintar yang dapat menyalurkan video berikut suara kepada Smartphone dan suara dari smartphone. Kamera ini merupakan Lite Versi, dimana dengan Harga yang lebih terjangkau.',
                'price' => 539000,
                'product_image' => 'https://bardi.co.id/wp-content/uploads/2022/11/Indoor-PTZ-Lite-Version.png'
            ],
            [
                'category_id' => 1,
                'product_name' => 'IP Camera Outdoor Static (Lite Version)',
                'description' => 'IP Camera Outdoor Static (Lite Version) memiliki tempat penyimpanan slot SD Card max 128GB (tidak termasuk) dan dapat memberi notifikasi bila ada yang lewat pada jam yang di tentukan dalam aplikasi.',
                'price' => 616000,
                'product_image' => 'https://bardi.co.id/wp-content/uploads/2022/11/Perspective-1-BARDI.png'
            ],
        ];

        Product::insert($products);
    }
}
