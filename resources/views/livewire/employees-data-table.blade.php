<div>
    <div class="d-flex justify-content-between mb-3">
        <div class="d-flex align-items-center">
            <label for="perPage" class="me-2 mb-0">Show</label>
            <select wire:model="perPage" id="perPage" class="form-select form-select-sm w-auto">
                <option>5</option>
                <option>10</option>
                <option>15</option>
                <option>25</option>
            </select>
            <span class="ms-2">entries</span>
        </div>
        <div class="d-flex align-items-center">
            <label for="search" class="me-2 mb-0">Search:</label>
            <input wire:model.debounce.300ms="search" id="search" class="form-control form-control-sm w-auto" type="text">
        </div>
    </div>    
    <div class="table-responsive">
        <table id="employeeTable" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th wire:click="sortBy('id')" style="cursor: pointer;">
                        ID
                        @include('partials._sort-icon', ['field' => 'id'])
                    </th>
                    <th>Avatar</th>
                    <th wire:click="sortBy('first_name')" style="cursor: pointer;">
                        Name
                        @include('partials._sort-icon', ['field' => 'first_name'])
                    </th>
                    <th wire:click="sortBy('email')" style="cursor: pointer;">
                        E-mail
                        @include('partials._sort-icon', ['field' => 'email'])
                    </th>
                    <th wire:click="sortBy('post')" style="cursor: pointer;">
                        Post
                        @include('partials._sort-icon', ['field' => 'post'])
                    </th>
                    <th wire:click="sortBy('phone')" style="cursor: pointer;">
                        Phone
                        @include('partials._sort-icon', ['field' => 'phone'])
                    </th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($employees as $employee)
                    <tr>
                        <td class="align-middle">{{ $employee->id }}</td>
                        <td>
                            <div class="bg-white d-inline-block rounded-circle px-1 py-1">
                                <img src="{{ $employee->avatar ? asset('storage/' . $employee->avatar) : 'https://0.gravatar.com/avatar/22bd03ace6f176bfe0c593650bcf45d8' }}" alt="image" width="50" height="50" class="rounded-circle">
                            </div>
                        </td>
                        <td class="align-middle">{{ $employee->first_name }} {{ $employee->last_name }}</td>
                        <td class="align-middle">{{ $employee->email }}</td>
                        <td class="align-middle">{{ $employee->post }}</td>
                        <td class="align-middle">{{ $employee->phone }}</td>
                        <td class="align-middle">
                            <a href="#" wire:click="selectItem({{ $employee->id }}, 'edit')"><i class="text-success h4 fas fa-edit"></i></a>
                            <a href="#" wire:click="selectItem({{ $employee->id }}, 'delete')"><i class="text-danger h4 fa-regular fa-trash-can"></i></a>
                            @livewire('edit-modal-handler', ['employee' => $employee], key($employee->id))
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No results found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="d-flex justify-content-between align-items-center mt-4">
            <div style="margin-top: -20px;">
                Showing {{ $employees->firstItem() }} to {{ $employees->lastItem() }} of {{ $employees->total() }} entries
            </div>
            <div>
                {{ $employees->links() }}
            </div>
        </div>
    </div>
</div>
