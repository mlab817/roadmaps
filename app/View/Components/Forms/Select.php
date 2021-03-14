<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Select extends Component
{
    public $selected;

    public $options;

    /**
     * Create a new component instance.
     *
     * @param string $name
     * @param null $selected
     * @param array $options
     */
    public function __construct($selected = null, $options = [])
    {
        $this->selected = $selected;
        $this->options = $options;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.forms.select');
    }
}
