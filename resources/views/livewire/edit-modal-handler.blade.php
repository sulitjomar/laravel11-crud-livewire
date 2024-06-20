<div>
    <!-- Edit Modal -->
    <div class="modal fade @if($showEditModal) show @endif" data-bs-backdrop="static" id="employeeEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" @if($showEditModal) style="display: block;" @else style="display: none;" @endif>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
                    <button type="button" class="btn-close" aria-label="Close" wire:click="$emit('closeEditModal')"></button>
                </div>
                <div class="modal-body bg-light">
                    @livewire('edit-employee-form')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="$emit('closeEditModal')">Close</button>
                    <button type="submit" class="btn btn-success" form="employeeEditForm">Update Employee</button>
                </div>
            </div>
        </div>
    </div>
</div>