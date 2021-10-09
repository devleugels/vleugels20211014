<?php

namespace App\Http\Controllers;

use App\Models\Vraag;
use Illuminate\Http\Request;
use Auth;
use App\Models\Helper;

class VraagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ( Auth::user()){
            // als je admin bent
            if ( \Auth::User()->isAdmin()){
                //   ga naar de adminpagina voor dit onderdeel, 
            } 
            // Je bent client of contactpersoon
            //   Maak nu een sessie variabele current_active
            $temp = null;
            if ( session()->has('current_active')){
                $temp = session()->get('current_active');
            }
      
            if ( $temp == null){
                // fout - meld dit
                $foutbericht = "[VraagController@index] er is geen sessievariabele current_active ";
                session(['fout' => $foutbericht]);
               dd('fout in vraagcontroller@index met tem=null'); 
                return route('showFout');
            }

            // haal de voor-en familienaam van de actieve user op
            $volledigenaam = Helper::getVolledigenaam( $temp );

            // haal nu het e-mail adres dat hoort bij deze login
            //   ( indien client -> zoek de contactpersoon -> haal e-mail)
            //   ( indien contactpersoon --> haal email )
            $email = Helper::getEmailadres( $temp ); // temp - current_active
            // dd("[VraagController@index] email = $email");
            // nu halen we de soorten vragen ( in vraagrubrieken )
            $vraagrubrieken = null; // TODO

            /*** TIJDELIJK */
            $vraagrubrieken = array(
                'intake', 'algemeen', 'prijs', 'duur', 'accomodatie'
            );
            /** einde TIJDELIJK  */
            return view('vraag.create', compact('email', 'vraagrubrieken', 'volledigenaam'));
         
        } else {
            // We onthouden dat we van hier komen
            $origin = array(
                'origin' => 'vraagcontroller',
            );
            // ga naar de contactpagina voor contactpersoon
         //   return view('contactpersoon.create', compact('origin'));
            return redirect()->action(
                [ContactpersoonController::class, 'create']  // , ['origin' => $origin]
            );
        

            // return view('contactpersoon.create', compact('origin'));
        };
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /** controleer of de contactpersoon gekend is */
        if ( session()->has('contactpersoon'))
        {
            $session_contactpersoon = session()->get('contactpersoon');
            $tijd = $session_contactpersoon['creationtime'];
            // echo("[VraagController@create] creationtiem = ".$tijd."<p />\n");
            if ( time() - $tijd > 300){
                dd(' tijd verstreken ');
            } else {
                $contactpersoon = $session_contactpersoon['contactpersoon'];
                // echo("[VraagController@create] contactpersoon = ".json_encode($contactpersoon)."<p />\n");
            }

        } else {
            dd("[VraagController@create] meld geen contactpersoon gevonden ");
        }

        // Als we hier terechtkomen dan is er een valide contactpersoon doorgegeven
        return view('vraag/create', compact('contactpersoon'));
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
     * @param  \App\Models\Vraag  $vraag
     * @return \Illuminate\Http\Response
     */
    public function show(Vraag $vraag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vraag  $vraag
     * @return \Illuminate\Http\Response
     */
    public function edit(Vraag $vraag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vraag  $vraag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vraag $vraag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vraag  $vraag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vraag $vraag)
    {
        //
    }
}
