<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PostGrid extends Component
{
    /**
     * Create a new component instance.
     */
    public $post;
    public function __construct(array $post)
    {
        $this->post = $post;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.post-grid');
    }
}
