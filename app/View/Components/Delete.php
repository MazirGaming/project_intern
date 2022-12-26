<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Delete extends Component
{
    public $route;
    public $label;
    public $onclick;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($route, $label, $onclick)
    {
        $this->route = $route;
        $this->label = $label;
        $this->onclick = $onclick;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button-delete');
    }
}
