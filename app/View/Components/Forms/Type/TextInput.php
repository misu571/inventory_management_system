<?php

namespace App\View\Components\Forms\Type;

use Illuminate\View\Component;

class TextInput extends Component
{
    public $id;
    public $type;
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
    public function __construct($type, $id, $label, $name, $classes, $validations, $value)
    {
        $this->id = $id;
        $this->type = $type;
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
        return view('components.forms.type.text-input');
    }
}
