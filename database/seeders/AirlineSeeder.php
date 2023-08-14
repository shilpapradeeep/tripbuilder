<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AirlineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('airlines')->insert(
            [
                "code" => "AC",
                "name" => "Air Canada",
                "image" => "ACx2.webp"
            ]
        );

        DB::table('airlines')->insert(
            [
                "code" => "QR",
                "name" => "Qatar Airways",
                "image" => "QR.png"
            ]
        );

        DB::table('airlines')->insert(
            [
                "code" => "PD",
                "name" => "Porter Airlines",
                "image" => "PDx2.png"
            ]
        );

        DB::table('airlines')->insert(
            [
                "code" => "EY",
                "name" => "Etihad Airways",
                "image" => "EYx2.png"
            ]
        );

    }
}
