<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use App\Models\Flight;
use Illuminate\Http\Request;
use App\Http\Resources\Airport as AirportResource;
use URL;

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
            
            $data = array('tr_from'=>$req->post('tr_from'),'tr_to'=>$req->post('tr_to'),'flight_type'=>$req->post('flight_type'));
            $from = $req->post('tr_from');
            $to   = $req->post('tr_to');
            $type = $req->post('flight_type');
            $redirect = URL::to('/flights?&d1='.$from.'&r1='.$to.'&tripType='.$type);

            $res = ['res'=>'1','msg'=>'success','redirect'=>$redirect ];

        }
        else{
            $res = ['res'=>'0','msg'=>'Sorry something went wrong!','errors'=> $validation->errors()->all()];
        }

        return response()->json($res);
    }
    
    public function getFlights1(Request $request) { 
        $airports = AirportResource::collection(
            Airport::select('id','code','name','city','country_code')->where(['status'=>'1'])->get());
        return view('flights_new',compact('airports'));
    }
    public function getFlights(Request $request) { 

        $departureAirport = $request->get('d1');
        $arrivalAirport = $request->get('r1');
        $tripType = $request->get('tripType');
        if($tripType == 'ONEWAYTRIP') {
            $flights = Flight::select(
                'outbound.id as outbound_id', 'outbound.number as outbound_flight_number','outbound.price as outbound_price',
                'outbound.departure_airport as outbound_departure', 'outbound.arrival_airport as outbound_arrival',
                'outbound.departure_time as outbound_departure_time','outbound.duration as outbound_duration',
                'outbound_airline.name as outbound_airlines_name','outbound_airline.image as outbound_airlines_image',
                'outbound_dep.name as outbound_airport_departure','outbound_dep.timezone as outbound_departure_timezone','outbound_dep.city as outbound_airport_from',
                'outbound_arrv.name as outbound_airport_arrival','outbound_arrv.timezone as outbound_arrival_timezone','outbound_arrv.city as outbound_airport_to'
            )
            ->from('flights as outbound')
            ->join('airlines as outbound_airline', 'outbound_airline.code', '=', 'outbound.airline')
            ->join('airports as outbound_dep', 'outbound_dep.code', '=', 'outbound.departure_airport')
            ->join('airports as outbound_arrv', 'outbound_arrv.code', '=', 'outbound.arrival_airport')
            ->where(['outbound.departure_airport'=>$request->get('d1'), 'outbound.arrival_airport'=>$request->get('r1')])
            ->paginate(2);
        }  
        else {
            $flights = Flight::select(
                'outbound.id as outbound_id', 'outbound.number as outbound_flight_number','outbound.price as outbound_price',
                'outbound.departure_airport as outbound_departure', 'outbound.arrival_airport as outbound_arrival',
                'outbound.departure_time as outbound_departure_time','outbound.duration as outbound_duration',
                'outbound_airline.name as outbound_airlines_name','outbound_airline.image as outbound_airlines_image',
                'outbound_dep.name as outbound_airport_departure','outbound_dep.timezone as outbound_departure_timezone','outbound_dep.city as outbound_airport_from',
                'outbound_arrv.name as outbound_airport_arrival','outbound_arrv.timezone as outbound_arrival_timezone','outbound_arrv.city as outbound_airport_to',
                'return.id as return_id', 'return.number as return_flight_number','return.price as return_price',
                'return.departure_airport as return_departure', 'return.arrival_airport as return_arrival',
                'return.departure_time as return_departure_time','return.duration as return_duration',
                'return_airline.name as return_airlines_name','return_airline.image as return_airlines_image',
                'return_dep.name as return_airport_departure','return_dep.timezone as return_departure_timezone','return_dep.city as return_airport_from',
                'return_arrv.name as return_airport_arrival','return_arrv.timezone as return_arrival_timezone','return_arrv.city as return_airport_to',
                
            )
            ->from('flights as outbound')
            ->join('flights as return', function ($join) use ($departureAirport, $arrivalAirport) {
                $join->on('outbound.arrival_airport', '=', 'return.departure_airport')
                        ->where('outbound.departure_airport', '=', $departureAirport)
                        ->where('return.arrival_airport', '=', $departureAirport)
                        ->where('return.departure_airport', '=', $arrivalAirport);
            })
            ->join('airlines as outbound_airline', 'outbound_airline.code', '=', 'outbound.airline')
            ->join('airports as outbound_dep', 'outbound_dep.code', '=', 'outbound.departure_airport')
            ->join('airports as outbound_arrv', 'outbound_arrv.code', '=', 'outbound.arrival_airport')
            ->join('airlines as return_airline', 'return_airline.code', '=', 'return.airline')
            ->join('airports as return_dep', 'return_dep.code', '=', 'return.departure_airport')
            ->join('airports as return_arrv', 'return_arrv.code', '=', 'return.arrival_airport')
            ->paginate(2);
        }               
        

        $airports = AirportResource::collection(
            Airport::select('id','code','name','city','country_code')->where(['status'=>'1'])->get());

        return view('flights',compact('flights','airports','tripType'));
    }
}
