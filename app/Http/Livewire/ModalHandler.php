<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ModalHandler extends Component
{
    protected $listeners = ['openModal', 'closeModal'];
    
    public $showModal = false;

    public function openModal()
    {
        $this->showModal = true;
        $this->dispatchBrowserEvent('openModal');
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->dispatchBrowserEvent('closeModal');
    }
    
    public function render()
    {
        return view('livewire.modal-handler');
    }
}
