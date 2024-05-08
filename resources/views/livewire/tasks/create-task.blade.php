<div>
    <form  action="">
       <div class="form-row">
        <div class="form-group col-md-6 mt-3">
            <label for="title">Task Title:</label>
            <input wire:model="title" type="text" id="title" placeholder="Task Title" class="form-control">
        </div>
       </div>

       <div class="form-row">
        <div class="form-group col-md-6 mt-3">
            <label for="title">Task Description:</label>
            <textarea wire:model="description" id="description" cols="20" rows="3" placeholder="Task Description" class="form-control"></textarea>
        </div>
       </div>

       <button wire:click.prevent="create" type="submit">Add Task</button>
    </form>
</div>