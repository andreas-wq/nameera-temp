<?php

namespace Nameera\NameeraTemplate\Views\Components;

use Illuminate\View\Component;

class NavItem extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $href = '#',
        public bool $active = false,
        public ?string $icon = null,
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('nameera::components.nav-item');
    }
}