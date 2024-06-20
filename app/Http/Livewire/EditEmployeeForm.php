<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employee;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UpdateEmployeeRequest;

class EditEmployeeForm extends Component
{
    use WithFileUploads;

    protected $listeners = ['getModalId', 'delete'];

    public $employeeId, $first_name, $last_name, $email, $phone, $post, $avatar, $currentAvatarUrl;
    public $showEditModal = false;

    public function getModalId($employeeId)
    {
        $this->employeeId = $employeeId;

        $employee = Employee::find($this->employeeId);

        $this->first_name = $employee->first_name;
        $this->last_name = $employee->last_name;
        $this->email = $employee->email;
        $this->phone = $employee->phone;
        $this->post = $employee->post;
        $this->currentAvatarUrl = $employee->avatar ? asset('storage/' . $employee->avatar) : null;
    }

    public function delete($employeeId)
    {   
        $this->employeeId = $employeeId;

        $employee = Employee::find($this->employeeId);

        if ($employee) {
            $employee->delete();
            $this->emit('employeeDeleted');
        }
    }

    public function update()
    {
        $validatedData = Validator::make($this->all(), (new UpdateEmployeeRequest)->rules())->validate();

        if ($this->avatar instanceof \Livewire\TemporaryUploadedFile) {
            $validatedData['avatar'] = $this->avatar->store('avatars', 'public');
        }

        if ($this->employeeId) {
            $employee = Employee::find($this->employeeId);
            $employee->update($validatedData);
        }

        $this->reset(['first_name', 'last_name', 'email', 'phone', 'post', 'avatar']);

        $this->emit('employeeUpdated', 'Employee updated successfully.');

        $this->showEditModal = false;
        $this->dispatchBrowserEvent('closeEditModal');
    }
    
    public function render()
    {
        return view('livewire.edit-employee-form');
    }
}
