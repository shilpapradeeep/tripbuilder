<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('flights')->insert(
        [
            "airline" => "AC",
            "number" => "301",
            "departure_airport" => "YUL",
            "departure_time" => "07:30",
            "arrival_airport" => "YVR",
            "Duration" => 330,
            "price" => "600.31"
        ]
        );

        DB::table('flights')->insert(      
        [
            "airline" => "AC",
            "number" => "304",
            "departure_airport" => "YVR",
            "departure_time" => "08:55",
            "arrival_airport" => "YUL",
            "Duration" => 277,
            "price" => "899.93"
        ]
        );

        DB::table('flights')->insert(
        [
            "airline" => "QR",
            "number" => "308",
            "departure_airport" => "YUL",
            "departure_time" => "09:30",
            "arrival_airport" => "YVR",
            "Duration" => 360,
            "price" => "599.31"
        ]
        );

        DB::table('flights')->insert(      
        [
            "airline" => "QR",
            "number" => "401",
            "departure_airport" => "YVR",
            "departure_time" => "10:55",
            "arrival_airport" => "YUL",
            "Duration" => 277,
            "price" => "799.93"
        ]
        );

        DB::table('flights')->insert(      
        [
            "airline" => "EY",
            "number" => "409",
            "departure_airport" => "YVR",
            "departure_time" => "10:55",
            "arrival_airport" => "YUL",
            "Duration" => 250,
            "price" => "1499.93"
        ]
        );

        DB::table('flights')->insert(      
        [
            "airline" => "EY",
            "number" => "222",
            "departure_airport" => "YUL",
            "departure_time" => "08:55",
            "arrival_airport" => "YDT",
            "Duration" => 270,
            "price" => "199.93"
        ]
        );

        DB::table('flights')->insert(      
        [
            "airline" => "QR",
            "number" => "410",
            "departure_airport" => "YDT",
            "departure_time" => "10:55",
            "arrival_airport" => "YUL",
            "Duration" => 300,
            "price" => "299.93"
        ]
        );

        DB::table('flights')->insert(      
        [
            "airline" => "AC",
            "number" => "411",
            "departure_airport" => "YDT",
            "departure_time" => "10:55",
            "arrival_airport" => "YUL",
            "Duration" => 320,
            "price" => "200"
        ]
        );

        DB::table('flights')->insert(      
        [
            "airline" => "AC",
            "number" => "412",
            "departure_airport" => "YUL",
            "departure_time" => "09:55",
            "arrival_airport" => "YPK",
            "Duration" => 330,
            "price" => "499.99"
        ]
        );

        DB::table('flights')->insert(      
        [
            "airline" => "EY",
            "number" => "413",
            "departure_airport" => "YPK",
            "departure_time" => "01:55",
            "arrival_airport" => "YUL",
            "Duration" => 390,
            "price" => "755.99"
        ]
        );
    }
}
