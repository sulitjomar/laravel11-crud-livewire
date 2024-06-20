<div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#employeeModal" wire:click="$emit('openModal')">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
            <path d="M12.75 7.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z"></path>
            <path d="M12 1c6.075 0 11 4.925 11 11s-4.925 11-11 11S1 18.075 1 12 5.925 1 12 1ZM2.5 12a9.5 9.5 0 0 0 9.5 9.5 9.5 9.5 0 0 0 9.5-9.5A9.5 9.5 0 0 0 12 2.5 9.5 9.5 0 0 0 2.5 12Z"></path>
        </svg> Add New Employee
    </button>

    <!-- Add Modal -->
    <div class="modal fade @if($showModal) show @endif" data-bs-backdrop="static" id="employeeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" @if($showModal) style="display: block;" @else style="display: none;" @endif>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Employee</h5>
                    <button type="button" class="btn-close" aria-label="Close" wire:click="$emit('closeModal')"></button>
                </div>
                <div class="modal-body bg-light">
                    @livewire('employee-form')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="$emit('closeModal')">Close</button>
                    <button type="submit" class="btn btn-primary" form="employeeForm">Add Employee</button>
                </div>
            </div>
        </div>
    </div>
</div>