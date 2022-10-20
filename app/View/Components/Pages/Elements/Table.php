<?php

namespace App\View\Components\Pages\Elements;

use Illuminate\Support\Arr;
use Illuminate\View\Component;

class Table extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.pages.elements.table');
    }

    public function listName(string $colunmName)
    {
        $string = explode(',', $colunmName);
        $array = str_replace(' ', '', Arr::wrap($string));

        return $array;
    }
}
