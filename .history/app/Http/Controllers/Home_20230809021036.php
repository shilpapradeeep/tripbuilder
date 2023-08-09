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

    public function submit(Request $req)
    {
        $validation = $req->validate([
            'flight_type'=>'required|max:55',
            'tr_from'=>'required|max:255',
            'tr_to'=>'required|max:255|different:tr_from',
        ],
        [
            'tr_from.required' => 'The From Destination is required.',
            'tr_to.required' => 'The To Destination is required.',
        ]); 
        
        if ($validation)
        {
        	// $contact = new Contact;
        	// $contact->c_name = $req->post('name');
            // $contact->c_email = $req->post('email');
            // $contact->c_phone = $req->post('phone');
            // $contact->c_message = $req->post('message');
            // if ($contact->save())
            // {

            //     $cd1 =['data'=>'Thank you for reaching us1. Your message sent to the admin successfully. Our representative will contact you shortly. ','status'=>'2'] ;
                

            // 	$res = ['res'=>'1','msg'=>'Thank You! Your message sent to the admin successfully'];
            // }
            // else
            // {
            	
            // 	$res = ['res'=>'0','msg'=>'Sorry something went wrong!'];
            // }


        }
        else{
            $res = ['res'=>'0','msg'=>'Sorry something went wrong!','errors'=>$validation->errors()->all()];
        }

        return response()->json($res);
    }
}
