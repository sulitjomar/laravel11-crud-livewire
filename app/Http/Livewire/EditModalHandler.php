<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EditModalHandler extends Component
{
    protected $listeners = ['openEditModal', 'closeEditModal'];

    public $showEditModal = false;
    
    public function openEditModal()
    {
        $this->showEditModal = true;
        $this->dispatchBrowserEvent('openEditModal');
    }

    public function closeEditModal()
    {
        $this->showEditModal = false;
        $this->dispatchBrowserEvent('closeEditModal');
    }

    public function render()
    {
        return view('livewire.edit-modal-handler');
    }
}
