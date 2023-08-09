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
        $data['airports'] = AirportResource::collection(
            Airport::select('id','code','name','city','country_code')->where(['status'=>'1'])->get());
        return view('home')->with($data);
    }
}
