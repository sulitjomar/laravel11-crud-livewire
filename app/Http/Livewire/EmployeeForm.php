<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employee;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Session;

class EmployeeForm extends Component
{
    use WithFileUploads;

    public $first_name, $last_name, $email, $phone, $post, $avatar;

    protected $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email|unique:employees,email',
        'phone' => 'nullable',
        'post' => 'required',
        'avatar' => 'nullable|image|max:1024'
    ];

    public function render()
    {
        return view('livewire.employee-form');
    }

    public function store()
    {
        $validatedData = $this->validate();

        if ($this->avatar) {
            $validatedData['avatar'] = $this->avatar->store('avatars', 'public');
        }

        Employee::create($validatedData);

        $this->reset(['first_name', 'last_name', 'email', 'phone', 'post', 'avatar']);

        $this->emit('employeeAdded', 'Employee created successfully.');

        $this->showModal = false;
        $this->dispatchBrowserEvent('closeModal');
    }
}
