<?php

namespace Nameera\NameeraTemplate\Views\Components\Form;

use Illuminate\View\Component;

class FileUpload extends Component
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
        public bool $multiple = false,
        public ?string $accept = null,
        public int $maxFiles = 1,
        public int $maxFileSize = 10, // MB
        public array $config = [],
    ) {
        $this->id = $id ?? 'file-upload-' . uniqid();
        $this->config = array_merge([
            'maxFiles' => $this->maxFiles,
            'maxFileSize' => $this->maxFileSize . 'MB',
            'allowMultiple' => $this->multiple,
            'acceptedFileTypes' => $this->accept ? [$this->accept] : null,
        ], $config);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('nameera::components.form.file-upload');
    }
}