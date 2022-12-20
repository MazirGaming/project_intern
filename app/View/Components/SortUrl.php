<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SortUrl extends Component
{
    public $columnName;
    public $sortType;
    public const SORT_TYPES = ['asc', 'desc'];
    public const SORT_DEFAULT = 'desc';



    public function __construct($columnName, $sortType)
    {
        $this->columnName = $columnName;
        $this->sortType = $sortType;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $routeName = request()->route()->getName();
        $params = request()->all();
        $params['column_name'] = $this->columnName;
        $params['sort_type'] = static::SORT_DEFAULT;

        if ($this->columnName === request()->get('column_name') && in_array(request()->get('sort_type'), static::SORT_TYPES)) {
            $params['sort_type'] = request()->get('sort_type') === 'desc' ? 'asc' : 'desc';
        }

        $sortUrl = route($routeName, $params);

        return view('components.sort-url', [
            'sortUrl' => $sortUrl,
        ]);
    }
}
