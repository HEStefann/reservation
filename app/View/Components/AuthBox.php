<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AuthBox extends Component
{
    public $action;

    public function __construct($action)
    {
        $this->action = $action;
    }

    public function render()
    {
        return view('components.auth-box');
    }
}
