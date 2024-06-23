<div>
    <form wire:submit.prevent="update" id="employeeEditForm">
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
       
        <div class="mb-3 bg-white d-inline-block px-1 py-1">
            @if ($avatar instanceof \Livewire\TemporaryUploadedFile)
                <img src="{{ $avatar->temporaryUrl() }}" alt="Avatar Preview" width="150" height="150">
            @elseif ($currentAvatarUrl)
                <img src="{{ $currentAvatarUrl }}" alt="Current Avatar" width="150" height="150">
            @else
                <img src="https://0.gravatar.com/avatar/22bd03ace6f176bfe0c593650bcf45d8" alt="Default Avatar" width="150" height="150">
            @endif
        </div>
    </form>
</div>