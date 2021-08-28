<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Knop extends Component
{
    public $url;
    public $stijl;
    public $kleur;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( $url, $stijl = 'daisy', $kleur = 'blauw')
    {
        $this->url = $url;
        $this->stijl = $stijl;
        $this->kleur = $kleur;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $klas = "inline-block px-5 py-3 rounded-lg
        transform transition bg-indigo-500 hover:bg-indigo-400
        hover:-translate-y-0.5
        focus:ring-indigo-500 focus:ring-opacity-50 focus:outline-none
        focus:ring focus:ring-offset-2 active:bg-indigo-600 uppercase
        tracking-wider font-semibold text-sm text-white shadow-lg
        sm:text-base";

        switch ( $this->stijl ){
            case 'menubalk' :
                $klas = "inline-block py-2 px-4 mx-1
                         border-2
                         font-semibold 
                         rounded-lg
                         hover:no-underline
                         no-underline
                        ";
                break;
            case 'daisy' :
                $klas = "btn btn-success";
                break;
            default :
                $klas = "inline-block px-5 py-3 rounded-lg
                transform transition bg-indigo-500 hover:bg-indigo-400
                hover:-translate-y-0.5
                focus:ring-indigo-500 focus:ring-opacity-50 focus:outline-none
                focus:ring focus:ring-offset-2 active:bg-indigo-600 uppercase
                tracking-wider font-semibold text-sm text-white shadow-lg
                sm:text-base";
                break;
        }

        switch ( $this->kleur ){
            case 'blauw' : 
              $bg_text = "bg-blue-500 text-white";
              $hover_kleur = "hover:bg-blue-700";
              break;
            case 'geel' :
              $bg_text = "bg-yellow-500 text-black";
              $hover_kleur = "hover:bg_yellow-700";
              break;
            default :
              $bg_text = "bg-blue-500 text-white";
              $hover_kleur = "hover:bg-blue-700";
        }

        $klas = $klas.' '.$bg_text.' '.$hover_kleur;

        return view('components.knop', [ 'klas' => $klas ]);
    }
}
