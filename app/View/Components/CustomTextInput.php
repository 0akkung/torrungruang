<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CustomTextInput extends Component
{
    public $name;
    public $label;
    public $type;
    public $placeholder;
    public $value;

    /**
     * Create a new component instance.
     */
    public function __construct($name, $label, $type = 'text', $placeholder = null, $value = null)
    {
        $this->name = $name;
        $this->label = $label;
        $this->type = $type;
        $this->placeholder = $placeholder;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.custom-text-input');
    }
}
