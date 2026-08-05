<?php

namespace Nameera\NameeraTemplate\Views\Components\Form;

use Illuminate\View\Component;

class Error extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $message = null,
        public string $class = '',
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.form.error');
    }
}