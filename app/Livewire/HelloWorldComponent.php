<?php

namespace App\Livewire;

use Livewire\Component;

class HelloWorldComponent extends Component
{
    public $message = 'Hello, World!';
    public function render()
    {
        return view('livewire.helloworld-component');
    }
}
