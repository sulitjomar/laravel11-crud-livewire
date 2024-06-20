<div>
    <form wire:submit.prevent="store" id="employeeForm">
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="first_name" wire:model="first_name" placeholder="First Name">
                    @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="last_name" wire:model="last_name" placeholder="Last Name">
                    @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" wire:model="email" placeholder="E-mail">
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" wire:model="phone" placeholder="Phone">
            @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="post" class="form-label">Post</label>
            <input type="text" class="form-control" id="post" wire:model="post" placeholder="Post">
            @error('post') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="avatar" class="form-label">Select Avatar</label>
            <input type="file" class="form-control" id="avatar" wire:model="avatar">
            @error('avatar') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </form>
</div>