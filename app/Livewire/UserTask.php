<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class UserTask extends Component
{
    use WithPagination;

    public $search = '';

    public $editingTaskTitle;

    public $editingTaskDescription;

    public $editingTaskID;

    public $title = '';

    public $description = '';

    public function create()
    {
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
        $this->reset(['title', 'description']);
        $this->resetPage();
    }
    public function edit(Task $task)
    {
        $this->editingTaskID = $task->id;
        $this->editingTaskTitle = $task->title;
        $this->editingTaskDescription = $task->description;
    }

    public function update()
    {
        Task::find($this->editingTaskID)->update([
            'title' => $this->editingTaskTitle,
            'description' => $this->editingTaskDescription,
        ]);
        $this->cancelEdit();
    }

    public function cancelEdit()
    {
        $this->reset('editingTaskID', 'editingTaskTitle', 'editingTaskDescription');
    }

    public function delete(Task $task)
    {
        // Todo::find($todoId)->delete();
        $task->delete();
        //alert to confirm to delete the items
        // $this->js("alert('Todo Deleted')"); 
    }
    public function render()
    {
        $data = Task::search($this->search)->paginate(4);
        $totalPages = $data->lastPage();
        return view('livewire.user-task', ['data' => $data, 'totalPages' => $totalPages]);
    }
}
