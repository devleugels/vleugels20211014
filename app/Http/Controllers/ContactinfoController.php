<?php

namespace App\Http\Controllers;

use App\Models\Contactinfo;
use App\Models\Emailadressen;
use Illuminate\Http\Request;
use Validator;

class ContactinfoController extends Controller
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
        //
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
     * @param  \App\Models\Contactinfo  $contactinfo
     * @return \Illuminate\Http\Response
     */
    public function show(Contactinfo $contactinfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contactinfo  $contactinfo
     * @return \Illuminate\Http\Response
     */
    public function edit(Contactinfo $contactinfo)
    {
        // enkel admin
        abort_unless(\Auth::check() && \Auth::User()->isAdmin(), 403);

        // ddd("[ContactinfoController@edit] contactinfo = ".json_encode( $contactinfo )."<br />");

        $extra = array(
            'isAdmin' => \Auth::user()->isAdmin(),
            'client_id' => 0,
            'urlterug' => 'home',
        );

        // we moeten de e-mail adressen nu doorgeven
        $emailadressen = Emailadressen::all();

        return view('contactinfo/edit', compact( 'contactinfo', 'extra', 'emailadressen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contactinfo  $contactinfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contactinfo $contactinfo)
    {
        // enkel admin
        abort_unless(\Auth::check() && \Auth::User()->isAdmin(), 403);

        /**
        echo("[ContactinfoController@update] request[data] = ".json_encode( $request['data'] )."<br />\n");
        echo("[ContactinfoController@update] contactinfo = ".json_encode( $contactinfo )."<br />\n");
        dd("[ContactinfoController@update] stop");
        **/

        $data = $request['data'];      
      
        // valideer 
        $validator = Validator::make( $data, [
          'banknaam' => 'required | min:2',
          'iban' => 'required | min:2',
          'bic' => 'required | min:2',
          'afzendernaam' => 'required | min:2',
          'straat' => 'required | min:2',
          'huisnummer' => 'required | min:1',
          'postcode' => 'required | min:4',
          'gemeente' => 'required | min:2',
          'email_id' => 'required', 
        ])->validate();      
        
        /* spaar de gegevens */
       $contactinfo = Contactinfo::findOrFail($data['id']);
       $contactinfo->banknaam = $data['banknaam'];
       $contactinfo->iban = $data['iban'];
       $contactinfo->bic = $data['bic'];
       $contactinfo->afzendernaam = $data['afzendernaam'];
       $contactinfo->straat = $data['straat'];
       $contactinfo->huisnummer = $data['huisnummer'];
       $contactinfo->postcode = $data['postcode'];
       $contactinfo->gemeente = $data['gemeente'];
       $contactinfo->telefoon = $data['telefoon'];
       $contactinfo->email_id = $data['email_id'];
       
       $contactinfo->save();        

 
        $bericht = "De contactinfo gegevens werden geupdate";
        session()->flash('bericht', $bericht);
        
        // we keren nu terug naar dezelfde pagina waar we van komen      
        $url = 'test';
        return  ['message' => $url];         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contactinfo  $contactinfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contactinfo $contactinfo)
    {
        //
    }

    /**
     * toon de fout ( als er een is) en ook alle
     * info van de vleugels, zodat het kan bereikt worden
     * 
     * @param $fout = is de fout dat we willen weergeven
     * @return view
     */
    public function showFout()
    {
        $fout = "fout onbekend";
        if ( request()->session()->has('fout')){
            $fout = session('fout');
        }

        // haal nu ook de contactinfo
        try {
            $contactinfo = Contactinfo::find(1)->first();
        } catch ( Exception $e){
            $fout .= "<br /> met exception $e";
        }

        return view('contactpagina', compact('fout', 'contactinfo'));
    }
}
