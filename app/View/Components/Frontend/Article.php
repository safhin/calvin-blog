<?php

namespace App\View\Components\Frontend;

use Illuminate\View\Component;

class Article extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $forntendPostModel;
    public function __construct($forntendPostModel)
    {
        $this->forntendPostModel = $forntendPostModel;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontend.article');
    }
}
