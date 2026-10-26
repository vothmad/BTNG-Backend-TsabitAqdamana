<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cars;

class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cars = [
            [
                'nama' => 'Avanza',
                'brand' => 'Toyota',
                'harga' => 250000000,
                'tahun' => 2024,
                'transmisi' => 'Matic',
                'bahan_bakar' => 'Bensin',
                'status' => 'tersedia',
                'foto' => null,
            ],
            [
                'nama' => 'Brio',
                'brand' => 'Honda',
                'harga' => 190000000,
                'tahun' => 2023,
                'transmisi' => 'Manual',
                'bahan_bakar' => 'Bensin',
                'status' => 'tersedia',
                'foto' => null,
            ],
            [
                'nama' => 'Innova',
                'brand' => 'Toyota',
                'harga' => 430000000,
                'tahun' => 2024,
                'transmisi' => 'CVT',
                'bahan_bakar' => 'Hybrid',
                'status' => 'tersedia',
                'foto' => null,
            ],
            [
                'nama' => 'Pajero',
                'brand' => 'Mitsubishi',
                'harga' => 280000000,
                'tahun' => 2022,
                'transmisi' => 'Matic',
                'bahan_bakar' => 'Bensin',
                'status' => 'sold',
                'foto' => null,
            ],
            [
                'nama' => 'Model 3',
                'brand' => 'Tesla',
                'harga' => 750000000,
                'tahun' => 2024,
                'transmisi' => 'Matic',
                'bahan_bakar' => 'Listrik',
                'status' => 'tersedia',
                'foto' => null,
            ],
        ];
        foreach ($cars as $cars) {
            Cars::create($cars);
        }
    }
}
