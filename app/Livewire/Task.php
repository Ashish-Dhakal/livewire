<?php

namespace App\Livewire;

use Livewire\Component;

class Task extends Component
{
    public $title , $description;

    public function create(){
        dd("sdfds");
    }
    public function render()
    {
        return view('livewire.task');
    }
}
