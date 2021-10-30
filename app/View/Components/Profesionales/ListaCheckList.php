<?php

namespace App\View\Components\Profesionales;

use Illuminate\View\Component;

class ListaCheckList extends Component
{
	public $profesionales;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($profesionales)
    {
			$this->profesionales = $profesionales;
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.profesionales.lista-check-list');
    }
}
