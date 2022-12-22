<?php

namespace Database\Seeders;

use App\Models\Galeri;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GaleriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gambar = [
            [
                "judul" => "Stuffing Export",
                "gambar" => "Stuffing.png",
            ],
            [
                "judul" => "IMPORT CHECKING CUSTOMS",
                "gambar" => "IMPORT CHECKING CUSTOMS.jpeg",
            ],
            [
                "judul" => "QUARANTINE CHECK",
                "gambar" => "QUARANTINE CHECK.png",
            ],
            [
                "judul" => "LCL/CFS",
                "gambar" => "LCL FCS.png",
            ],
            [
                "judul" => "MARKETING & CS",
                "gambar" => "Marketing CS.png",
            ],
            [
                "judul" => "CUSTOMERS SERVICES & FINANCE",
                "gambar" => "Flight Cargo.png",
            ],
        ];
        foreach ($gambar as $key => $value) {
            Galeri::create($value);
        }
    }
}
