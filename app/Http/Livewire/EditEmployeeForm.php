<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employee;
use Livewire\WithFileUploads;

class EditEmployeeForm extends Component
{
    use WithFileUploads;

    public $employeeId;
    public $first_name, $last_name, $email, $phone, $post, $avatar;
    public $currentAvatarUrl;
    public $showEditModal = false;

    protected $listeners = ['getModalId', 'delete'];

    protected $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email',
        'phone' => 'nullable',
        'post' => 'required',
        'avatar' => 'nullable|image|max:1024'
    ];

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
        $data = $this->validate();

        if ($this->avatar instanceof \Livewire\TemporaryUploadedFile) {
            $data['avatar'] = $this->avatar->store('avatars', 'public');
        }

        if ($this->employeeId) {
            $employee = Employee::find($this->employeeId);
            $employee->update($data);
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
