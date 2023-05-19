<?php

namespace Database\Seeders;

use App\Models\House;
use Illuminate\Database\Seeder;

class HouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        House::create([
            'type' => 'Rumah Type A',
            'price' => 100000000,
            'status' => 'Tersedia',
            'photo' => 'rumah1.jpg',
            'keterangan' => 'Rumah dengan 2 kamar tidur dan 1 kamar mandi'
        ]);

        House::create([
            'type' => 'Rumah Type B',
            'price' => 150000000,
            'status' => 'Tersedia',
            'photo' => 'rumah2.jpg',
            'keterangan' => 'Rumah dengan 3 kamar tidur dan 2 kamar mandi'
        ]);

        House::create([
            'type' => 'Rumah Type C',
            'price' => 200000000,
            'status' => 'Tersedia',
            'photo' => 'rumah3.jpg',
            'keterangan' => 'Rumah dengan 4 kamar tidur dan 3 kamar mandi'
        ]);
    }
}
