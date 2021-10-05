<?php

namespace App\Http\Controllers;

use App\Models\Emailadressen;
use Illuminate\Http\Request;
use Validator;
use Redirect;
use App\Http\Controllers\ContactinfoController;

class EmailadressenController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    } 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // enkel admin
        abort_unless(\Auth::check() && \Auth::User()->isAdmin(), 403);

        $emailadressen = Emailadressen::all();
        // echo("[EmailAdressenController@index] emailadressen = ".json_encode($emailadressen));
        // ddd("[EmailAdressenController@index] - gestart" );

        /** vul nu de array extra ****/
        $extra = [
            'isAdmin' => \Auth::user()->isAdmin(),
            'client_id' => 0,
            'tabelnaam' => 'emailadressen',
        ];

        $display = array( 'id', 'naam', 'email');
        $knoppen = array('edit', 'delete', 'add');

        session()->flash('bericht', 'We testen de flash');

        return view('emailadressen.index', compact('emailadressen', 'extra', 'display', 'knoppen'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // enkel admin
        abort_unless(\Auth::check() && \Auth::User()->isAdmin(), 403);

        // ddd("[emailadressenController@create] ");
        $emailadres = array(
            'id' => 0,
            'naam' => '',
            'email' => '',
        );

        $extra = array(
            'isAdmin' => 1,
            'client_id' => 0,
            'urlterug' => 'emailadressen',
        );

        return view('emailadressen.create', compact('emailadres', 'extra'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // enkel admin
        abort_unless(\Auth::check() && \Auth::User()->isAdmin(), 403);

        $data = $request['data'];
        // dd("[EmailadressenController@store] data = ".json_encode($data));
        // valideer
        $validator = $this->valideer($data);

        $Emailadressen = Emailadressen::create($data);
     
        $bericht = "Een nieuwe naam met bijhorend e-mailadres voor de vleugels werd toegevoegd";
        session()->flash('bericht', $bericht);

        return ['message' => 'test'];
    }

    private function valideer($data)
    {
        // valideer
        $validator = Validator::make( $data, [
            'naam' => 'required | unique:emailadressens| min:2',
            'email' => 'required|email:rfc,dns'
        ])->validate();
        
        return $validator;
    }       

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Emailadressen  $emailadressen
     * @return \Illuminate\Http\Response
     */
    public function show(Emailadressen $emailadressen)
    {
        // enkel admin
        abort_unless(\Auth::check() && \Auth::User()->isAdmin(), 403);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Emailadressen  $emailadressen
     * @return \Illuminate\Http\Response
     */
    public function edit(Emailadressen $emailadressen)
    {
        // enkel admin
        abort_unless(\Auth::check() && \Auth::User()->isAdmin(), 403);

        // ddd("[EmailadressenConroller@edit] - emailadressen = ".json_encode($emailadressen) );
        // enkel extra invullen

        $extra = array(
            'isAdmin' => 1,
            'client_id' => 0,
            'urlterug' => 'emailadressen',
        );

        return view('emailadressen.edit', compact('emailadressen', 'extra'));       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Emailadressen  $emailadressen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Emailadressen $emailadressen)
    {
        // enkel admin
        abort_unless(\Auth::check() && \Auth::User()->isAdmin(), 403);
        
        $data = $request['data'];
        // echo("[EmailadressenController@updata] request[data] = ".json_encode($data));
        // dd("[EmailadressenController@updata] emailadresssen = ".json_encode($emailadressen));

        // $validator = $this->valideer($data);
        $validator = Validator::make( $data, [
            'naam' => 'required | min:2',
            'email' => 'required|email:rfc,dns'
        ])->validate();

        try {
            $emailadres = Emailadressen::findOrFail($data['id']);
        } catch ( Exception $e ) {
            $foutbericht = "[EmailadressenController@update] emailadres[".$data['id']."] niet gevonden - fout = ".json_encode( $e );
            session([ 'fout' => $foutbericht ]);
            return ['fout' => 'dit is fout'];   
        }
         
        $emailadres->naam = $data['naam'];
        $emailadres->email = $data['email'];
        $emailadres->save();

        $bericht = "Het emailadres van de vleugels werd geupdate";
        session()->flash('berich', $bericht);

        $url = 'test';
        return ['message' => $url];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Emailadressen  $emailadressen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Emailadressen $emailadressen)
    {
        // enkel admin
        abort_unless(\Auth::check() && \Auth::User()->isAdmin(), 403);

        ddd("[emailadressenController@destroy] binnen ");

    }

    public function delete(Emailadressen $emailadressen)
    {
        // enkel admin
        abort_unless(\Auth::check() && \Auth::User()->isAdmin(), 403);

        // ddd("[emailadressenController@delete] emailadressen = ".json_encode($emailadressen));
        try{
            $emailadres = Emailadressen::findOrFail($emailadressen->id);
        } catch( Exception $e){
            dd("[EmailadressenController@delete] ga naar foutmeldingpagina - fout = ".json_encode($e));
        }
        $emailadres->delete();

        $bericht = "Het emailadres werd verwijderd";
        session()->flash('bericht', $bericht);

        return redirect('/emailadressen');

    }    


}
