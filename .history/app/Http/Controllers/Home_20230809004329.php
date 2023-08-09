<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use Illuminate\Http\Request;

class Home extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $airports = Airport::where(['status'=>'1'])->get();
        echo "<pre>"; print_r($airports);
        return view('home');
    }
}
