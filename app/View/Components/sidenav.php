<?php

namespace App\View\Components;

use Illuminate\View\Component;

class sidenav extends Component
{
    /**
     * La empresa con la que se identifica el sitio web.
     *
     * @var string
     */

    // public $empresa;

    /**
     * El usuario que está autenticado.
     *
     * @var string
     */

    // public $usuario;

    /**
     * Create the component instance.
     *
     * @param  string  $empresa
     * @param  string  $usuario
     * @return void
     */
    public function __construct()
    {
        // //
        // $this->empresa = $empresa;
        // $this->usuario = $usuario;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sidenav');
    }
}
