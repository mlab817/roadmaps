<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PageTitle extends Component
{
    public $title;

    /**
     * Create a new component instance.
     *
     * @param string $title
     */
    public function __construct(string $title = '')
    {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return <<<'blade'
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {{ $title }}
</h2>
blade;
    }
}
