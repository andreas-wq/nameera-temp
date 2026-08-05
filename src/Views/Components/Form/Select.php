<?php

namespace Nameera\NameeraTemplate\Views\Components\Form;

use Illuminate\View\Component;

class Select extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $id = null,
        public ?string $label = null,
        public ?string $help = null,
        public ?string $error = null,
        public bool $required = false,
        public array $options = [],
        public ?string $placeholder = null,
    ) {
        $this->id = $id ?? 'select-' . uniqid();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.form.select');
    }
}