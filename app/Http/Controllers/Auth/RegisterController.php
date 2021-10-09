<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ContactpersoonController;
use App\Models\Contactpersoon;
use App\Models\Helper;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    protected $nieuweUser;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $this->nieuweUser = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        return $this->nieuweUser;
    }

    /**
     * Deze functie voegen we toe om te kunnen kiezen
     * waar we naartoe moeten als we alles hebben
     * ingevuld en op de register knop hebben geduwd
     */
    protected function redirectTo()
    {
        // indien er een systemvariabele contactpersoon bestaat
        // dan springen we naar /vraag
        // anders springen we naar home ( nu )
        $contactpersoonBestaat = session()->has('contactpersoon');
        if ( $contactpersoonBestaat){
            // we bewaren nu de id van de nieuw aangemaakte user
            // bij de contactpersoon.
            $user_id = $this->nieuweUser->id;
            // dd("user_id = $user_id");
            $cp = session()->get('contactpersoon')['contactpersoon'];
            
            $contactpersoon = Contactpersoon::find($cp->id); // $cp->id
            if ( $contactpersoon == null){
                $foutbericht = "[RegisterController@redirectTo] bevat een fout \n"
                 . "De contactpersoon met id = $cp->id werd niet gevonden\n";
                session(['fout' => $foutbericht]);
                return route('showFout');
                 // return view('contactpagina', compact('foutbericht'));
            }
            
            $contactpersoon->user_id = $user_id;
            $contactpersoon->save();

            Helper::makeCurrentActive('contactpersoon', $user_id);

            return '/vraag';
        } else {
            return '/home';
        }
           
    }
}
