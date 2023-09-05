<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowNearestRestaurants extends Component
{
    public $restaurants;

    /**
     * Create a new component instance.
     */
    public function __construct($restaurants)
    {
        $this->restaurants = $restaurants;
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.show-nearest-restaurants', ['restaurant' => $this->restaurants]);
    }
}
