<?php

namespace App\View\Components\Forms\Type;

use Illuminate\View\Component;

class TextareaInput extends Component
{
    public $id;
    public $label;
    public $name;
    public $classes;
    public $value;
    public $validations;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $label, $name, $classes, $validations, $value)
    {
        $this->id = $id;
        $this->label = str_contains($validations, 'required') ? ucfirst($label) . ' <span class="text-danger">*</span>' : ucfirst($label);
        $this->name = $name;
        $this->classes = $classes ?? null;
        $this->validations = $validations ?? null;
        $this->value = $value ?? null;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.type.textarea-input');
    }
}
