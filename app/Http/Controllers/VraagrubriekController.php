<?php

namespace App\Http\Controllers;

use App\Models\Vraagrubriek;
use Illuminate\Http\Request;

class VraagrubriekController extends Controller
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


        // dd("[VraagrubriekConroller@index]");
        $vraagrubriek = Vraagrubriek::all();

        /** vul nu de array extra ****/
        $extra = [
            'isAdmin' => \Auth::user()->isAdmin(),
            'client_id' => 0,
        ];

        return view('vraagrubriek.index', compact('vraagrubriek', 'extra'));

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

        dd("[VraagrubriekConroller@create]");
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

        dd("[VraagrubriekConroller@store]");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vraagrubriek  $vraagrubriek
     * @return \Illuminate\Http\Response
     */
    public function show(Vraagrubriek $vraagrubriek)
    {
        // enkel admin
        abort_unless(\Auth::check() && \Auth::User()->isAdmin(), 403);

        dd("[VraagrubriekConroller@show]");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vraagrubriek  $vraagrubriek
     * @return \Illuminate\Http\Response
     */
    public function edit(Vraagrubriek $vraagrubriek)
    {
        // enkel admin
        abort_unless(\Auth::check() && \Auth::User()->isAdmin(), 403);

        dd("[VraagrubriekConroller@edit]");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vraagrubriek  $vraagrubriek
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vraagrubriek $vraagrubriek)
    {
        // enkel admin
        abort_unless(\Auth::check() && \Auth::User()->isAdmin(), 403);

        dd("[VraagrubriekConroller@update]");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vraagrubriek  $vraagrubriek
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vraagrubriek $vraagrubriek)
    {
        // enkel admin
        abort_unless(\Auth::check() && \Auth::User()->isAdmin(), 403);

        dd("[VraagrubriekConroller@destroy]");
    }
}
