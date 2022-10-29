<?php

namespace App\View\Components\Pages\Elements;

use Illuminate\View\Component;

class Action extends Component
{
    public $name;
    public $nameId;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $nameId)
    {
        $this->name = $name;
        $this->nameId = $nameId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.pages.elements.action');
    }
}
