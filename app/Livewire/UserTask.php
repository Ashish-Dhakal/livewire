<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserTask extends Component
{

    public $title='' ;

    public $description='';

    public function create(){
        $this->validate([
            'title' => 'required|min:5', // Adjust the minimum length as needed
            'description' => 'required|min:5', // Adjust the minimum length as needed
        ]);
    
        $user = Auth::user()->id; 


    
    
        Task::create([
            'user_id' => $user,
            'title' => $this->title,
            'description' => $this->description,
        ]);

    }
    public function render()
    {
        return view('livewire.user-task');
    }
}
