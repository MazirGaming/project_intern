<?php

declare(strict_types=1);

namespace App\View\Components;

use Illuminate\View\Component;
use Closure;

class Delete extends Component
{
    public $route;
    public $label;
    public $userId;
    public $currentUserId;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($route, $label, $userId, $currentUserId)
    {
        $this->route = $route;
        $this->label = $label;
        $this->userId = $userId;
        $this->currentUserId = $currentUserId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|Closure|string
     */
    public function render()
    {
        return view('components.button-delete');
    }
}
