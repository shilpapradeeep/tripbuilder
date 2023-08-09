<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use Illuminate\Http\Request;
use App\Http\Resources\Airport as AirportResource;
use Illuminate\Support\Facades\Http;

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

    public function submit(Request $req)
    {
        $validation = $req->validate([
            'flight_type'=>'required|max:55',
            'tr_from'=>'required|max:255',
            'tr_to'=>'required|max:255|different:tr_from',
        ],
        [
            'tr_from.required' => 'Please enter a From city or airport.',
            'tr_to.required' => 'Please enter a To city or airport.',
            'tr_to.different' => 'Please enter a different From and To city or airport.',
        ]); 
        
        if ($validation)
        {
            echo "validated"; exit;
        	// $response = Http::get('http://127.0.0.1:8000/api/v1/flights');
            // echo "<pre>"; print_r($response);


        }
        else{
            $res = ['res'=>'0','msg'=>'Sorry something went wrong!','errors'=>$validation->errors()->all()];
        }

        return response()->json($res);
    }
}
