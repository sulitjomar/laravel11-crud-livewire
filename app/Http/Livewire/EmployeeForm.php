<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employee;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreEmployeeRequest;

class EmployeeForm extends Component
{
    use WithFileUploads;

    public $first_name, $last_name, $email, $phone, $post, $avatar;

    public function render()
    {
        return view('livewire.employee-form');
    }

    public function store()
    {
        $validatedData = Validator::make($this->all(), (new StoreEmployeeRequest)->rules())->validate();

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
