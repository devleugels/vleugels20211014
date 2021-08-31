<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DubbeleKnop extends Component
{
    public $url1;
    public $url2;
    public $tekst1;
    public $tekst2;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( $url1, $url2, $tekst1, $tekst2)
    {
        $this->url1 = $url1;
        $this->url2 = $url2;
        $this->tekst1 = $tekst1;
        $this->tekst2 = $tekst2;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dubbele-knop');
    }
}
