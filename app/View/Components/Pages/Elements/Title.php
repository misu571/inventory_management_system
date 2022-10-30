<?php

namespace App\View\Components\Pages\Elements;

use Illuminate\View\Component;

class Title extends Component
{
    public $title;
    public $route;
    public $parentPage;
    public $currentPage;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $route, $parentPage, $currentPage)
    {
        $this->title = $title;
        $this->route = $route;
        $this->parentPage = ucfirst(rtrim(ltrim($parentPage, ' '), ' '));
        $this->currentPage = strtolower(rtrim(ltrim($currentPage, ' '), ' '));
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.pages.elements.title');
    }
}
