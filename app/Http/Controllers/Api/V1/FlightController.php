<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $flight_api = array(
            "airlines" => array(
                array(
                    "code" => "AC",
                    "name" => "Air Canada"
                )
            ), 
            "airports" => array(
                array(
                    "code" => "YUL",
                    "city_code" => "YMQ",
                    "name" => "Pierre Elliott Trudeau International",
                    "city" => "Montreal",
                    "country_code" => "CA",
                    "latitude" => 45.457714,
                    "longitude" => -73.749908,
                    "timezone" => "America/Montreal"
                ),
                array(
                    "code" => "YVR",
                    "city_code" => "YVR",
                    "name" => "Vancouver International",
                    "city" => "Vancouver",
                    "country_code" => "CA",
                    "latitude" => 49.194698,
                    "longitude" => -123.179192,
                    "timezone" => "America/Vancouver"
                )
        
            ), 
            "flights" => array(
                array(
                    "airline" => "AC",
                    "number" => "301",
                    "departure_airport" => "YUL",
                    "departure_time" => "07:30",
                    "arrival_airport" => "YVR",
                    "Duration" => 330,
                    "price" => "600.31"
                ),
                array(
                    "airline" => "AC",
                    "number" => "304",
                    "departure_airport" => "YVR",
                    "departure_time" => "08:55",
                    "arrival_airport" => "YUL",
                    "Duration" => 277,
                    "price" => "499.93"
                )
        
            ), 
        );
        
        return response()->json(['data'=>$flight_api,'status' => 'OK']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
