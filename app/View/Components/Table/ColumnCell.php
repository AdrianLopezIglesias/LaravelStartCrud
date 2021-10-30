<?php

namespace App\View\Components\Table;

use Illuminate\View\Component;

class ColumnCell extends Component
{
	public $column = "Sin datos";
	public $condition = true;
	public $link = "";
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($column, $condition = true, $link = "")
    {
      $this->column = $column; 
      $this->condition = $condition; 
      $this->link = $link; 
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
				return view('components.table.column-cell');
			}
    }
}
