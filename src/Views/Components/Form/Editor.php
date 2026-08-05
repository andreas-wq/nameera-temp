<?php

namespace Nameera\NameeraTemplate\Views\Components\Form;

use Illuminate\View\Component;

class Editor extends Component
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
        public array $config = [],
        public string $height = '400px',
    ) {
        $this->id = $id ?? 'editor-' . uniqid();
        $this->config = array_merge([
            'height' => $this->height,
            'menubar' => true,
            'plugins' => 'advlist autolink lists link image charmap print preview anchor searchreplace visualblocks code fullscreen insertdatetime media table paste code help wordcount',
            'toolbar' => 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
        ], $config);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.form.editor');
    }
}