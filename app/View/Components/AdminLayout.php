<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AdminLayout extends Component
{
    /**
     * @var string
     */
    public $name;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('layouts.admin');
    }
}
