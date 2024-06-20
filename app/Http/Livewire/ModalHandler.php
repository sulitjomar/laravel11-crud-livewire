<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ModalHandler extends Component
{
    public $showModal = false;
    protected $listeners = ['openModal', 'closeModal'];

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
