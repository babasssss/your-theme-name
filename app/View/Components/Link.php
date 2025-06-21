<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Link extends Component
{
    public $text;
    public $url;
    public $target;
    /**
     * Create a new component instance.
     */
    public function __construct($text = null, $url = null, $target = null)
    {
        $this->text = $text;
        $this->url = $url;
        $this->target = $target;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.link');
    }
}
