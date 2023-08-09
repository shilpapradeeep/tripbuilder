<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use Illuminate\Http\Request;
use App\Http\Resources\Airport as AirportResource;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

class Home extends Controller
{
    public function __construct()
    {
        ini_set('max_execution_time', 50000);
    }
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
            echo "insideee";
        	// $response = Http::get('http://127.0.0.1:8000/api/v1/flights');
            // echo "<pre>"; print_r($response);
            // exit;

            
            // $url ="http://127.0.0.1:8000/api/v1/status";
            // $ch=curl_init();
            // curl_setopt($ch, CURLOPT_URL, $url);
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
            // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
            // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
            // $curl_response = curl_exec($ch);

            // $request = Request::create('/api/v1/status', 'GET');
            // $instance = json_decode(Route::dispatch($request)->getContent());
            $request = Request::create('/api/v1/status', 'GET');

            $response = Route::dispatch($request);

            echo "<pre>"; print_r($response);
            exit;
            //$result = json_decode($curl_response,true);


        }
        else{
            $res = ['res'=>'0','msg'=>'Sorry something went wrong!','errors'=>$validation->errors()->all()];
        }

        return response()->json($res);
    }

    public function api(){ 
        // $request = Request::create('/api/v1/flights', 'GET');
        // $response = Route::dispatch($request);

        //$response = Http::get('http://127.0.0.1:8000/api/v1/status');

        echo "<pre>"; print_r($response);
        exit;
    }
}
