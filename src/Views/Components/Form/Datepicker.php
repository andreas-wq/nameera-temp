<?php

namespace Nameera\NameeraTemplate\Views\Components\Form;

use Illuminate\View\Component;

class Datepicker extends Component
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
        public ?string $value = null,
        public string $format = 'Y-m-d',
        public array $config = [],
    ) {
        $this->id = $id ?? 'datepicker-' . uniqid();
        $this->config = array_merge([
            'dateFormat' => $this->format,
            'altFormat' => 'F j, Y',
            'altInput' => true,
        ], $config);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('nameera::components.form.datepicker');
    }
}