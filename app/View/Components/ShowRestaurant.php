<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowRestaurant extends Component
{
    public $restaurants;

    public function __construct($restaurants)
    {
        $this->restaurants = $restaurants;
    }

    public function render(): View|Closure|string
    {
        return view('components.show-restaurant', ['restaurants' => $this->restaurants]);
    }
}
