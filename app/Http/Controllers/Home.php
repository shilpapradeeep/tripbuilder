<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use App\Models\Flight;
use App\Models\Airline;
use Illuminate\Http\Request;
use App\Http\Resources\Airport as AirportResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use URL;

class Home extends Controller
{
    public function __construct()
    {
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $airports = $this->fetchAirport();
        return view('home',compact('airports'));
    }

    // Handle form submission for flight search
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
            $redirect = URL::to('/filter-flights?&d1='.$from.'&r1='.$to.'&tripType='.$type);

            $res = ['res'=>'1','msg'=>'success','redirect'=>$redirect ];

        }
        else{
            $res = ['res'=>'0','msg'=>'Sorry something went wrong!','errors'=> $validation->errors()->all()];
        }

        return response()->json($res);
    }
    
    // Handle flight search based on user input
    public function searchFlights(Request $request) { 

        $departureAirport = $request->get('d1');
        $arrivalAirport = $request->get('r1');
        $tripType = $request->get('tripType');

        $nearByAirport = (!empty($request->get('nearByAirport'))) ? array('to'=>$request->get('r1'),'latitude'=>$request->get('latitude'),'longitude'=>$request->get('longitude')) : array();
        $sort = $request->get('sort_by');
        $page = $request->get('page');
        $flights = $this->actionFlightSearch($departureAirport,$arrivalAirport,$tripType,'',$sort,$page,$nearByAirport); 
        $airports = $this->fetchAirport();

        $airlines = $this->fetchAirline();

        return view('flights',compact('flights','airports','tripType','airlines'));
    }

    // Filter flight search results
    public function filterFlights(Request $request)
    {
        
        if( !empty($request->get('type')) && $request->get('type') == 'cost_search')
        {
            $validation = $request->validate([
                'min_cost'=>'required|max:55',
                'max_cost'=>'required|max:255',
            ],
            [
                'min_cost.required' => 'Please enter minimum cost.',
                'max_cost.required' => 'Please enter a maximum cost.',
            ]); 

            if (!$validation)
            {
                
                $res = ['res'=>'0','msg'=>'Sorry something went wrong!','errors'=> $validation->errors()->all()];
                return response()->json($res);
            }

            
        }
        $departureAirport = $request->get('d1'); 
        $arrivalAirport = $request->get('r1'); 
        $tripType = $request->get('tripType'); 
        $airlines = $request->get('airline_codes'); 
        $filter_condtion = array('airlines' => $airlines);
        $sort = $request->get('sort_by');
        $nearByAirport = (!empty($request->get('nearByAirport'))) ? array('to'=>$request->get('r1'),'latitude'=>$request->get('latitude'),'longitude'=>$request->get('longitude')) : array();
        $flights = $this->actionFlightSearch($departureAirport,$arrivalAirport,$tripType,$filter_condtion,$sort,'',$nearByAirport);
        $view = view('include.flight', [
            'flights' => $flights,
            'tripType' =>$tripType 
        ])->render();

        return response()->json(['res'=>'1','html'=>$view]);
    }

    // Handle pagination of filtered flight results
    public function filterPagination(Request $request)
    {
        $departureAirport = $request->get('d1');
        $arrivalAirport = $request->get('r1'); 
        $tripType = $request->get('tripType'); 
        $airlines_selected = $request->get('airline_codes'); 
        $filter_condtion = array('airlines' => $airlines_selected);
        $sort = $request->get('sort_by');
        $page = $request->get('page');

        $airports = $this->fetchAirport();
        $airlines = $this->fetchAirline();
        $nearByAirport = (!empty($request->get('nearByAirport'))) ? array('to'=>$request->get('r1'),'latitude'=>$request->get('latitude'),'longitude'=>$request->get('longitude')) : array();
        $flights = $this->actionFlightSearch($departureAirport,$arrivalAirport,$tripType,$filter_condtion,$sort,$page,$nearByAirport);
        $view = view('include.flight', [
            'flights' => $flights,
            'tripType' =>$tripType 
        ])->render();
        return view('flights',compact('flights','airports','tripType','airlines','airlines_selected'));

    }

     // Fetch airport data
    private function fetchAirport()
    {

        $airports = Airport::select('id','code','name','city','country_code','city_code','latitude','longitude')->where(['status'=>'1'])->get();
        return $airports;
    }

    // Fetch airline data
    private function fetchAirline()
    {

        $airlines = Airline::select('id','code','name')->where(['status'=>'1'])->get();
        return $airlines;
    }
    
    // Perform flight search based on various conditions
    public function actionFlightSearch($departureAirport,$arrivalAirport,$tripType,$filter_condtion=NULL,$sort=NULL,$page=NULL,$nearByAirport=NULL){

        $cacheKey = "flights:$departureAirport-$arrivalAirport-$tripType-$page";
        // Check if the flight search result is cached
        if (Cache::has($cacheKey) && empty($filter_condtion) && empty($nearByAirport) && empty($sort)) {
            return Cache::get($cacheKey);
        }
        if(!empty($nearByAirport) && $tripType == 'ONEWAYTRIP')
        {
           
            $lat = $nearByAirport['latitude'];
            $log = $nearByAirport['longitude'];
            $airportsCollection =  Airport::select(
                'id', 'code',
                DB::raw("
                    (
                        6371 * acos(
                            cos(radians('$lat')) * cos(radians(latitude)) *
                            cos(radians(longitude) - radians('$log')) +
                            sin(radians('$lat')) * sin(radians(latitude))
                        )
                    ) AS nearby_distance")
                )
                ->where('code', '!=', $arrivalAirport)
                ->having('nearby_distance', '<', 100) // 100 km radius
                ->get(); 
            $airports = array(); 
            foreach($airportsCollection as $ki => $airport) {
                $airports[] = $airport->code;
            }
            $flights_query = Flight::select(
                'outbound.id as outbound_id', 'outbound.number as outbound_flight_number','outbound.price as outbound_price',
                'outbound.departure_airport as outbound_departure', 'outbound.arrival_airport as outbound_arrival',
                'outbound.departure_time as outbound_departure_time','outbound.duration as outbound_duration',
                'outbound_airline.name as outbound_airlines_name','outbound_airline.image as outbound_airlines_image',
                'outbound_dep.name as outbound_airport_departure','outbound_dep.timezone as outbound_departure_timezone','outbound_dep.city as outbound_airport_from','outbound_dep.latitude as outbound_departure_latitude','outbound_dep.longitude as outbound_departure_longitude',
                'outbound_arrv.name as outbound_airport_arrival','outbound_arrv.timezone as outbound_arrival_timezone','outbound_arrv.city as outbound_airport_to','outbound_arrv.latitude as outbound_arrival_latitude','outbound_arrv.longitude as outbound_arrival_longitude',
                DB::raw('
                    (
                        6371 * acos(
                            cos(radians(outbound_dep.latitude)) * cos(radians(outbound_arrv.latitude)) *
                            cos(radians(outbound_arrv.longitude) - radians(outbound_dep.longitude)) +
                            sin(radians(outbound_dep.latitude)) * sin(radians(outbound_arrv.latitude))
                        )
                    ) AS outbound_distance
                ')
            )
            ->from('flights as outbound')
            ->join('airlines as outbound_airline', 'outbound_airline.code', '=', 'outbound.airline')
            ->join('airports as outbound_dep', 'outbound_dep.code', '=', 'outbound.departure_airport')
            ->join('airports as outbound_arrv', 'outbound_arrv.code', '=', 'outbound.arrival_airport')
            ->where(['outbound.departure_airport'=>$departureAirport])
            ->whereIn('outbound_arrv.code', $airports);
            if(!empty($filter_condtion['airlines'])) {
                $flights = $flights_query->whereIn('outbound.airline',$filter_condtion['airlines']);
                //echo $flights_query->toSql(); exit;
            }
            if(!empty($sort))
            {
                if($sort == 1)
                {
                    $flights_query->orderBy('outbound.price','ASC');
                } 
                elseif($sort == 2)
                {
                    $flights_query->orderBy('outbound.duration','ASC');
                } 
            }
            $flights = $flights_query->paginate(2);

        }
        elseif($tripType == 'ONEWAYTRIP') {
            $flights_query = Flight::select(
                'outbound.id as outbound_id', 'outbound.number as outbound_flight_number','outbound.price as outbound_price',
                'outbound.departure_airport as outbound_departure', 'outbound.arrival_airport as outbound_arrival',
                'outbound.departure_time as outbound_departure_time','outbound.duration as outbound_duration',
                'outbound_airline.name as outbound_airlines_name','outbound_airline.image as outbound_airlines_image',
                'outbound_dep.name as outbound_airport_departure','outbound_dep.timezone as outbound_departure_timezone','outbound_dep.city as outbound_airport_from','outbound_dep.latitude as outbound_departure_latitude','outbound_dep.longitude as outbound_departure_longitude',
                'outbound_arrv.name as outbound_airport_arrival','outbound_arrv.timezone as outbound_arrival_timezone','outbound_arrv.city as outbound_airport_to','outbound_arrv.latitude as outbound_arrival_latitude','outbound_arrv.longitude as outbound_arrival_longitude',
                DB::raw('
                    (
                        6371 * acos(
                            cos(radians(outbound_dep.latitude)) * cos(radians(outbound_arrv.latitude)) *
                            cos(radians(outbound_arrv.longitude) - radians(outbound_dep.longitude)) +
                            sin(radians(outbound_dep.latitude)) * sin(radians(outbound_arrv.latitude))
                        )
                    ) AS outbound_distance
                ')
            )
            ->from('flights as outbound')
            ->join('airlines as outbound_airline', 'outbound_airline.code', '=', 'outbound.airline')
            ->join('airports as outbound_dep', 'outbound_dep.code', '=', 'outbound.departure_airport')
            ->join('airports as outbound_arrv', 'outbound_arrv.code', '=', 'outbound.arrival_airport')
            ->where(['outbound.departure_airport'=>$departureAirport, 'outbound.arrival_airport'=>$arrivalAirport]);
            if(!empty($filter_condtion['airlines'])) {
                $flights = $flights_query->whereIn('outbound.airline',$filter_condtion['airlines']);
                //echo $flights_query->toSql(); exit;
            }
            if(!empty($sort))
            {
                if($sort == 1)
                {
                    $flights_query->orderBy('outbound.price','ASC');
                } 
                elseif($sort == 2)
                {
                    $flights_query->orderBy('outbound.duration','ASC');
                } 
            }
            // echo $flights_query->toSql(); exit;
            $flights = $flights_query->paginate(2);
        }
        elseif(!empty($nearByAirport) && $tripType == 'ROUNDTRIP')
        {
          
            $lat = $nearByAirport['latitude'];
            $log = $nearByAirport['longitude'];
            $airportsCollection =  Airport::select(
                'id', 'code',
                DB::raw("
                    (
                        6371 * acos(
                            cos(radians('$lat')) * cos(radians(latitude)) *
                            cos(radians(longitude) - radians('$log')) +
                            sin(radians('$lat')) * sin(radians(latitude))
                        )
                    ) AS nearby_distance")
                )
                ->where('code', '!=', $arrivalAirport)
                ->having('nearby_distance', '<', 100) // 100 km radius
                ->get(); 
            $airports = array(); 
            foreach($airportsCollection as $ki => $airport) {
                $airports[] = $airport->code;
            }
            $flights_query = Flight::select(
                'outbound.id as outbound_id', 'outbound.number as outbound_flight_number','outbound.price as outbound_price',
                'outbound.departure_airport as outbound_departure', 'outbound.arrival_airport as outbound_arrival',
                'outbound.departure_time as outbound_departure_time','outbound.duration as outbound_duration',
                'outbound_airline.name as outbound_airlines_name','outbound_airline.image as outbound_airlines_image',
                'outbound_dep.name as outbound_airport_departure','outbound_dep.timezone as outbound_departure_timezone','outbound_dep.city as outbound_airport_from','outbound_dep.latitude as outbound_departure_latitude','outbound_dep.longitude as outbound_departure_longitude',
                'outbound_arrv.name as outbound_airport_arrival','outbound_arrv.timezone as outbound_arrival_timezone','outbound_arrv.city as outbound_airport_to','outbound_arrv.latitude as outbound_arrival_latitude','outbound_arrv.longitude as outbound_arrival_longitude',
                'return.id as return_id', 'return.number as return_flight_number','return.price as return_price',
                'return.departure_airport as return_departure', 'return.arrival_airport as return_arrival',
                'return.departure_time as return_departure_time','return.duration as return_duration',
                'return_airline.name as return_airlines_name','return_airline.image as return_airlines_image',
                'return_dep.name as return_airport_departure','return_dep.timezone as return_departure_timezone','return_dep.city as return_airport_from',
                'return_arrv.name as return_airport_arrival','return_arrv.timezone as return_arrival_timezone','return_arrv.city as return_airport_to',
                DB::raw('
                    (
                        6371 * acos(
                            cos(radians(outbound_dep.latitude)) * cos(radians(outbound_arrv.latitude)) *
                            cos(radians(outbound_arrv.longitude) - radians(outbound_dep.longitude)) +
                            sin(radians(outbound_dep.latitude)) * sin(radians(outbound_arrv.latitude))
                        )
                    ) AS outbound_distance
                ')
            )
            ->from('flights as outbound')
            ->join('flights as return', function ($join) use ($departureAirport, $arrivalAirport,$airports) {
                $join->on('outbound.arrival_airport', '=', 'return.departure_airport')
                        ->where('outbound.departure_airport', '=', $departureAirport)
                        ->where('return.arrival_airport', '=', $departureAirport)
                        // ->where('return.departure_airport', '=', $arrivalAirport);
                        ->whereIn('return.departure_airport', $airports);
                        
            })
            ->join('airlines as outbound_airline', 'outbound_airline.code', '=', 'outbound.airline')
            ->join('airports as outbound_dep', 'outbound_dep.code', '=', 'outbound.departure_airport')
            ->join('airports as outbound_arrv', 'outbound_arrv.code', '=', 'outbound.arrival_airport')
            ->join('airlines as return_airline', 'return_airline.code', '=', 'return.airline')
            ->join('airports as return_dep', 'return_dep.code', '=', 'return.departure_airport')
            ->join('airports as return_arrv', 'return_arrv.code', '=', 'return.arrival_airport');

            if(!empty($sort))
            {
                if($sort == 1)
                {
                    $flights_query->orderByRaw('(outbound.price + return.price) asc');
                }
                elseif($sort == 2)
                {
                    $flights_query->orderByRaw('(outbound.duration + return.duration) asc');
                }  
            }
            

            if(!empty($filter_condtion['airlines'])) {
                $flights = $flights_query
                ->whereIn('outbound.airline',$filter_condtion['airlines'])
                ->orwhereIn('return.airline',$filter_condtion['airlines']);
            }
            $flights = $flights_query->paginate(2);

        }
        elseif($tripType == 'ROUNDTRIP') {
            $flights_query = Flight::select(
                'outbound.id as outbound_id', 'outbound.number as outbound_flight_number','outbound.price as outbound_price',
                'outbound.departure_airport as outbound_departure', 'outbound.arrival_airport as outbound_arrival',
                'outbound.departure_time as outbound_departure_time','outbound.duration as outbound_duration',
                'outbound_airline.name as outbound_airlines_name','outbound_airline.image as outbound_airlines_image',
                'outbound_dep.name as outbound_airport_departure','outbound_dep.timezone as outbound_departure_timezone','outbound_dep.city as outbound_airport_from','outbound_dep.latitude as outbound_departure_latitude','outbound_dep.longitude as outbound_departure_longitude',
                'outbound_arrv.name as outbound_airport_arrival','outbound_arrv.timezone as outbound_arrival_timezone','outbound_arrv.city as outbound_airport_to','outbound_arrv.latitude as outbound_arrival_latitude','outbound_arrv.longitude as outbound_arrival_longitude',
                'return.id as return_id', 'return.number as return_flight_number','return.price as return_price',
                'return.departure_airport as return_departure', 'return.arrival_airport as return_arrival',
                'return.departure_time as return_departure_time','return.duration as return_duration',
                'return_airline.name as return_airlines_name','return_airline.image as return_airlines_image',
                'return_dep.name as return_airport_departure','return_dep.timezone as return_departure_timezone','return_dep.city as return_airport_from',
                'return_arrv.name as return_airport_arrival','return_arrv.timezone as return_arrival_timezone','return_arrv.city as return_airport_to',
                DB::raw('
                    (
                        6371 * acos(
                            cos(radians(outbound_dep.latitude)) * cos(radians(outbound_arrv.latitude)) *
                            cos(radians(outbound_arrv.longitude) - radians(outbound_dep.longitude)) +
                            sin(radians(outbound_dep.latitude)) * sin(radians(outbound_arrv.latitude))
                        )
                    ) AS outbound_distance
                ')
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
            ->join('airports as return_arrv', 'return_arrv.code', '=', 'return.arrival_airport');

            if(!empty($sort))
            {
                if($sort == 1)
                {
                    $flights_query->orderByRaw('(outbound.price + return.price) asc');
                }
                elseif($sort == 2)
                {
                    $flights_query->orderByRaw('(outbound.duration + return.duration) asc');
                }  
            }
            

            if(!empty($filter_condtion['airlines'])) {
                $flights = $flights_query
                ->whereIn('outbound.airline',$filter_condtion['airlines'])
                ->orwhereIn('return.airline',$filter_condtion['airlines']);
            }
            $flights = $flights_query->paginate(2);
        }
        // Cache the search results for a specific duration (e.g., 1 hour)
        Cache::put($cacheKey, $flights, now()->addHours(1));

        return $flights;
    }
}
