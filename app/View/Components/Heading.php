<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Heading extends Component
{
    public $text;
    public $class;
    public $level;

    /**
     * Create a new component instance.
     */
    public function __construct($text, $class = null, $level = 1)
    {
        $this->text = $text;
        $this->class = $class ?: '810:text-88 text-4xl';
        $this->level = in_array($level, [1, 2, 3, 4, 5, 6]) ? $level : 1;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.heading');
    }
}
