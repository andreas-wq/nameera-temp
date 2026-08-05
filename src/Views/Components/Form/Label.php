<?php

namespace Nameera\NameeraTemplate\Views\Components\Form;

use Illuminate\View\Component;

class Label extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $for,
        public bool $required = false,
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('nameera::components.form.label');
    }
}