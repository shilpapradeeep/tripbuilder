<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use Illuminate\Http\Request;
use App\Http\Resources\Airport as AirportResource;

class Home extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $airports = AirportResource::collection(
            Airport::select('id','code','name','city')->where(['status'=>'1'])->get());
        echo "<pre>"; print_r($airports);
        return view('home');
    }
}
