<?php

namespace App\View\Components\Forms\Type;

use Illuminate\View\Component;

class SelectInput extends Component
{
    public $id;
    public $label;
    public $name;
    public $validations;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $label, $name, $validations)
    {
        $this->id = $id;
        $this->label = str_contains($validations, 'required') ? ucfirst($label) . ' <span class="text-danger">*</span>' : ucfirst($label);
        $this->name = $name;
        $this->validations = $validations ?? null;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.type.select-input');
    }
}
