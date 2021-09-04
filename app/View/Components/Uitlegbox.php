<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Uitlegbox extends Component
{
    public $kort;
    public $uitgebreid;
    public $alert;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( $kort, $uitgebreid, $alert = NULL)
    {
        $this->kort = $kort;
        $this->uitgebreid = $uitgebreid;
        $this->alert = $alert;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.uitlegbox');
    }
}
