<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Label extends Component
{
    public $label;

    /**
     * Create a new component instance.
     *
     * @param string $label
     */
    public function __construct(string $label = '')
    {
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.forms.label');
    }
}
