<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ReservationModal extends Component
{
    public $restaurants;

    public function __construct($restaurants)
    {
        $this->restaurants = $restaurants;
    }

    public function render(): View|Closure|string
    {
        return view('components.reservation-modal', ['restaurants' => $this->restaurants]);
    }
}
