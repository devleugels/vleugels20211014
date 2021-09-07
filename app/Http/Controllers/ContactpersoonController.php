<?php

namespace App\Http\Controllers;

use App\Models\Contactpersoon;
use Illuminate\Http\Request;
use Auth;

class ContactpersoonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $thisRequest = request()->all();
        // $data = $thisRequest['origin'];      
        // dd($data);

        // echo("[ContactpersoonController@create] origin = ".json_encode($origin));
        // maak een lege contactpersoon
        $contactpersoon = array(
            'id' => 0,
            'voornaam' => '',
            'familienaam' => '',
            'straat' => '',
            'huisnummer' => '',
            'bus' => '',
            'postcode' => '',
            'gemeente' => '',
            'telefoon' => '',
            'gsm' => '',
            'email' => '',
           );
          
        $aangemeld = Auth::user();
        $client_id = 0;

        if ( isset($aangemeld)){
            // LET OP -- user->id is niet noodzakelijk client_id
            echo("[ContactpersoonController@create] controleer user en client_id");
            $client_id = Auth::user()->id;
            // TODO - isAdmin
            echo("[ContactpersoonController@create] test of deze user admin is");
        }            

        $extra = array(
            'isAdmin' => 0,
            'client_id' => $client_id,
        );
//        dd("[contactpersoonController@create] voor return");           
        return view('contactpersoon.create', compact('contactpersoon', 'extra'));           
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contactpersoon  $contactpersoon
     * @return \Illuminate\Http\Response
     */
    public function show(Contactpersoon $contactpersoon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contactpersoon  $contactpersoon
     * @return \Illuminate\Http\Response
     */
    public function edit(Contactpersoon $contactpersoon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contactpersoon  $contactpersoon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contactpersoon $contactpersoon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contactpersoon  $contactpersoon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contactpersoon $contactpersoon)
    {
        //
    }
}
