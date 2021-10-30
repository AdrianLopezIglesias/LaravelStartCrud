<?php

namespace App\View\Components\Table;

use Illuminate\View\Component;

class ColumnHeader extends Component
{
	public $column = "Sin datos";
	public $condition = true;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($column, $condition = true)
    {
      $this->column = $column; 
      $this->condition = $condition; 
    }

		public function show($option){
    return $option === $this->selected;
}
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
			if($this->condition){
				return view('components.table.column-header');
			}
    }
}
