<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class HelloWorldComponent extends Component
{
    public $message = 'Hello, World!';

    use WithFileUploads;

    public $name;
    public $price;
    public $image;
    public $products = [];
    public $successMessage;
  

    public function submit()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:1024', // Max 1MB
        ]);

        // Add product to the list
        $this->products[] = [
            'name' => $this->name,
            'price' => $this->price,
            'image' => $this->image,
        ];

        // Reset form fields
        $this->reset(['name', 'price', 'image']);
        $this->successMessage = 'Product added successfully!';
    }
    public function render()
    {
        return view('livewire.helloworld-component');
    }
}
