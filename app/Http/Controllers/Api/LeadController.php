<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use App\Models\Lead;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => ['required'],
            'address' => ['required', 'email'],
            'body' => ['required'],
        ]);
        //se fallisce fa questo, ritorna un messaggio di errore
        if($validator->fails()){
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }
        $newLead = new Lead(); // creazione del messaggio
        $newLead->fill($data);
        $newLead->save();

        Mail::to('marco@boolfolio.com')->send(new NewContact($newLead)); //invio email

        //invio confermato
        return response()->json([
            'success' => true,
        ]);
    }
}
