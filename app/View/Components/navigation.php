<?php

namespace App\View\Components;

use Illuminate\View\Component;

class navigation extends Component
{
    /**
     * El usuario con el  que se autentica.
     *
     * @var string
     */
    // public $usuario;

    /**
     * Create the component instance.
     *
     * @param  string  $usuario
     * @return void
     */
    public function __construct()
    {
        //
        // $this->usuario = $usuario;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.navigation');
    }
}
