<?php

namespace App\View\Components\form;

use Illuminate\View\Component;

class RowInput extends Component
{
    protected $name;
    protected $value;

    protected $label;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $value, $label)
    {
        $this->name = $name;
        $this->value = $value;

        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.row-input');
    }
}
