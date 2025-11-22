<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ReportSeeder extends Seeder
{
    public function run()
    {
        DB::table('reports')->upsert([
            [
                'id' => 1,
                'item_name' => 'Dompet Kulit Coklat',
                'reporter_name' => 'Cintia',
                'finder_name' => 'Arshavin',
                'location' => 'Kantin Sekolah',
                'last_seen' => 'Kelas 10 TKJ 3',
                'time_lost' => Carbon::now()->subDays(2),
                'time_found' => Carbon::now()->subHours(2),
                'description' => 'Dompet berisi beberapa kartu identitas dan uang tunai.',
                'category' => 'Aksesoris',
                'brand' => 'Eiger',
                'size' => '15 cm',
                'color' => 'Coklat',
                'image_path' => 'images/default_image.jpg',
                'report_type' => 'found',
            ],
            [
                'id' => 2,
                'item_name' => 'Jam Tangan Hitam',
                'reporter_name' => 'Agus',
                'finder_name' => 'Evlina',
                'location' => 'Lapangan Basket',
                'last_seen' => 'Kelas 10 TKJ 1',
                'time_lost' => Carbon::now()->subDays(2),
                'time_found' => Carbon::now()->subHours(2),
                'description' => 'Jam tangan digital merek Casio.',
                'category' => 'Aksesoris',
                'brand' => 'Casio',
                'size' => '20 cm',
                'color' => 'Hitam',
                'image_path' => 'images/default_image.jpg',
                'report_type' => 'found',
            ],
            [
                'id' => 3,
                'item_name' => 'Tas Sekolah Biru',
                'reporter_name' => 'Budi',
                'finder_name' => '',
                'location' => '',
                'last_seen' => 'Kelas 10 TKJ 2',
                'time_lost' => Carbon::now()->subHours(5),
                'time_found' => null,
                'description' => 'Tas sekolah berisi buku pelajaran dan botol minum.',
                'category' => 'Perlengkapan Sekolah',
                'brand' => 'Nike',
                'size' => '45 cm',
                'color' => 'Biru',
                'image_path' => 'images/default_image.jpg',
                'report_type' => 'lost',
            ],
            [
                'id' => 4,
                'item_name' => 'Handphone Redmi Note 10',
                'reporter_name' => 'Asep',
                'finder_name' => '',
                'location' => '',
                'last_seen' => 'Kelas 11 TKJ 3',
                'time_lost' => Carbon::now(),
                'time_found' => null,
                'description' => 'HP hilang saat jam istirahat, casing warna hijau.',
                'category' => 'Elektronik',
                'brand' => 'Xiaomi',
                'size' => '6 inch',
                'color' => 'Hijau',
                'image_path' => 'images/default_image.jpg',
                'report_type' => 'lost',
            ],
        ], ['id'], [
            'item_name', 'reporter_name', 'finder_name','location', 'last_seen', 'time_lost', 'time_found',
            'description', 'category', 'brand', 'size', 'color',
            'image_path', 'report_type'
        ]);
    }
}
