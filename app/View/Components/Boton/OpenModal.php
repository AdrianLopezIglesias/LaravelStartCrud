<?php

namespace App\View\Components\Boton;

use Illuminate\View\Component;

class OpenModal extends Component
{

	public $datos = "";
	public $url = "";
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($datos,  $url)
    {
        $this->datos = $datos;
				$this->url = $url;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.boton.open-modal');
    }
}
