<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowRestaurant extends Component
{
    public $restaurant;

    public function __construct($restaurant)
    {
        $this->restaurant = $restaurant;
    }

    public function render(): View|Closure|string
    {
        return view('components.show-restaurant', ['restaurant' => $this->restaurant]);
    }
}
