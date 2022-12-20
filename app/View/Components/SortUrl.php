<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SortUrl extends Component
{
    public $columnName;
    public $sortType;
    public const SORT_TYPES = ['asc', 'desc'];
    public const SORT_DEFAULT = 'desc';
    public const ICON_SORT = [
        'desc' => 'fa-caret-down',
        'asc' => 'fa-caret-up',
        'both' => 'fa-sort',
        ];

    public function __construct($columnName)
    {
        $this->columnName = $columnName;
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
        $iconSort = static::ICON_SORT['both'];

        if ($this->columnName === request()->get('column_name') && in_array(request()->get('sort_type'), static::SORT_TYPES)) {
            $params['sort_type'] = request()->get('sort_type') === 'desc' ? 'asc' : 'desc';
        }

        if (request()->get('column_name') == $this->columnName) {
            $iconSort = strtolower(request()->get('sort_type')) == 'desc' ? static::ICON_SORT['asc'] : static::ICON_SORT['desc'];
        } elseif (request()->get('sort_type') == 'asc' && request()->get('column_name') == $this->columnName) {
            $iconSort = strtolower(request()->get('sort_type')) == 'asc' ? static::ICON_SORT['desc'] : static::ICON_SORT['desc'];
        }

        return view('components.sort-url', [
            'sortUrl' => route($routeName, $params),
            'iconSort' => $iconSort
        ]);
    }
}
