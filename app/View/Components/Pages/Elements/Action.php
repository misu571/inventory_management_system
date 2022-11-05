<?php

namespace App\View\Components\Pages\Elements;

use Illuminate\View\Component;

class Action extends Component
{
    private $btn;
    private $name;
    private $nameId;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($btn, $name, $nameId)
    {
        $this->btn = $btn; // -v : view button, -e : edit button, -d : delete button, -a : all button, null : all button
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

    public function buttons()
    {
        $buttons = [];
        if (str_contains($this->btn, 'a')) {
            $buttons = [
                '<a href="' . route($this->name .  '.show', [$this->nameId]) . '" data-color="#6c757d" style="color: rgb(108,117,125);">
                    <i class="icon-copy dw dw-view" data-toggle="tooltip" title="View"></i>
                </a>',
                '<a href="' . route($this->name .  '.edit', [$this->nameId]) . '" data-color="#265ed7" style="color: rgb(38, 94, 215);">
                    <i class="icon-copy dw dw-edit2" data-toggle="tooltip" title="Edit"></i>
                </a>',
                '<a href="#deleteModal" data-toggle="modal" data-route="' . route($this->name .  '.destroy', [$this->nameId]) . '" data-color="#e95959" style="color: rgb(233, 89, 89);">
                    <i class="icon-copy dw dw-delete-3" data-toggle="tooltip" title="Delete"></i>
                </a>'
            ];
        } else {
            if (str_contains($this->btn, 'v')) {
                array_push($buttons, '<a href="' . route($this->name .  '.show', [$this->nameId]) . '" data-color="#6c757d" style="color: rgb(108,117,125);">
                    <i class="icon-copy dw dw-view" data-toggle="tooltip" title="View"></i>
                </a>');
            }
            if (str_contains($this->btn, 'e')) {
                array_push($buttons, '<a href="' . route($this->name .  '.edit', [$this->nameId]) . '" data-color="#265ed7" style="color: rgb(38, 94, 215);">
                    <i class="icon-copy dw dw-edit2" data-toggle="tooltip" title="Edit"></i>
                </a>');
            }
            if (str_contains($this->btn, 'd')) {
                array_push($buttons, '<a href="#deleteModal" data-toggle="modal" data-route="' . route($this->name .  '.destroy', [$this->nameId]) . '" data-color="#e95959" style="color: rgb(233, 89, 89);">
                    <i class="icon-copy dw dw-delete-3" data-toggle="tooltip" title="Delete"></i>
                </a>');
            }
        }
        
        return $buttons;
    }
}
