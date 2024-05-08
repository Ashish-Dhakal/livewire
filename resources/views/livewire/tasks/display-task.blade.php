<div>
    <div class="container">

        <div class="form-group col-md-6 mt-3">
            <input wire:model.live.debounce.300ms="search" type="text" class="form-control" placeholder="Search">
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Task Title</th>
                    <th scope="col">Task Description</th>
                    <th scope="col">Task Created By</th>
                    <th scope="col">Task Created At</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>

                @foreach ($data as $d)
                    <tr wire:key="{{ $d->id }}">
                        <td>
                            @if ($editingTaskID === $d->id)
                                <input wire:model="editingTaskTitle" type="text">
                                @error('editingTaskTitle')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            @else
                                {{ $d->title }}
                            @endif

                        </td>
                        <td>{{ $d->description }}

                            @if ($editingTaskID === $d->id)
                                <input wire:model="editingTaskDescription" type="text">
                                @error('editingTaskDescription')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            @else
                                {{ $d->description }}
                            @endif
                        </td>


                        <td>{{ $d->user->name }}</td>
                        <td>{{ $d->created_at }}</td>
                        <td>
                            @if ($editingTaskID === $d->id)
                                <div class="">
                                    <button wire:click="update" style="border: none; background:none;"><i
                                            class="fas fa-check-circle" style="color: #27c44e;"></i></button>
                                    <button wire:click="cancelEdit" style="border: none; background:none;"><i
                                            class="fas fa-times" style="color: #c62a2a;"></i></button>
                                </div>
                            @endif
                            <button wire:click="edit({{ $d->id }})" style="border: none;background:none;"><i
                                    class="fas fa-edit" style="color: #2361cd;"></i></button>
                            <button wire:click="delete({{ $d->id }})" style="border: none; background:none;"><i
                                    class="fa-solid fa-trash" style="color: #ff0000;"></i></button>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>




        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" wire:click="previousPage" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>

                @for ($page = 1; $page <= $totalPages; $page++)
                    <li class="page-item">
                        <a class="page-link" href="#"
                            wire:click="gotoPage({{ $page }})">{{ $page }}</a>
                    </li>
                @endfor

                <li class="page-item">
                    <a class="page-link" wire:click="nextPage" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>



    </div>

</div>
