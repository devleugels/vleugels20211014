<?php

namespace App\Http\Controllers;

use App\Models\Vraag;
use Illuminate\Http\Request;
use Auth;

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
            //   ga naar de adminpagina voor dit onderdeel, 
            //   maar wat moet je daar doen????
            // anders contactpersoon of client
            //   stel je vraag
            echo("aangemeld");
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
