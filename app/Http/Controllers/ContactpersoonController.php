<?php

namespace App\Http\Controllers;

use App\Models\Contactpersoon;
use Illuminate\Http\Request;
use Auth;
use Validator;
use Illuminate\Support\Facades\DB;

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
            'urlterug' => 'register',
        );
// 'urlterug' => 'vraag/create',        
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
        // dd("[ContactpersoonController@store] stop");
        $data = $request['data'];
        // dd("[ContactpersoonController@store] data = ".json_encode($data));

        $validator = $this->valideer($data);

        // spaar de gegevens
        $contactpersoon = Contactpersoon::create($data);

        $session_contactpersoon = array(
            'contactpersoon' => $contactpersoon,
            'creationtime' => time()
        );
        session(['contactpersoon' => $session_contactpersoon]);

        /** als de contactpersoon werd aangemaakt bij "stel je vraag"
         *    ( je komt hier slechts als je niet was aangemeld )
         */

        $bericht = "De gegevens van de contacpersoon werden opgeslagen";
        session()->flash('bericht', $bericht);        

        return ['message' => 'test'];
    }

    private function valideer($data)
    {
        // valideer
        $validator = Validator::make( $data, [
            'voornaam' => 'required | min:2',
            'familienaam' => 'required | min:2',
            'straat' => 'required | min:2',
            'huisnummer' => 'required | min:1',
            'postcode' => 'required | min:4',
            'gemeente' => 'required | min:2',
            // 'telefoon' => 'required | min:2',
            // 'gsm' => 'required | min:2',
            // 'email' => 'sometimes|email:rfc,dns'
        ])->validate();
        
        return $validator;
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
        dd("[ContactpersoonController@edit] contactpersoon = ".json_encode($contactpersoon));
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


    /**
     * isAanwezig zal controleren in tabel contactpersoons
     * of er reeds een persoon is geregistreerd met dezelfde
     * voor- en familienaam
     * 
     * @param voornaam en familienaam
     * @return true als voor- en familienaam bestaan
     */
    public function isAanwezig( )
    {
        $all = request()->all();
        $voornaam = $all['voornaam'];
        $familienaam = $all['familienaam'];
        // echo("[ContactpersoonControllr@isAanwezig] voornaam = $voornaam en familienaam = $familienaam ");
        // Zoek in tabel contactpersoons of deze reeds bestaat
        $query = DB::table('contactpersoons')
                    ->where('voornaam', $voornaam )
                    ->where('familienaam', $familienaam);
        //echo("[ContactpersoonControllr@isAanwezig] aantal in query = ".$query->count());
        return $query->first();
    }

}
