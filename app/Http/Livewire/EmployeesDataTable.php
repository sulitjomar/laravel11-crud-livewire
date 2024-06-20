<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employee;
use Livewire\WithPagination;

class EmployeesDataTable extends Component
{
    use WithPagination;
    
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['employeeAdded' => 'refreshEmployeeList', 'employeeUpdated' => 'refreshEmployeeList', 'employeeDeleted' => 'refreshEmployeeList'];
    
    public $sortBy = 'last_name';
    public $sortDirection = 'asc';
    public $perPage = 10;
    public $search = '';
    public $action;
    public $selectedItem;

    public function refreshEmployeeList()
    {
        $this->render();
    }

    public function selectItem($itemId, $action)
    {
        $this->selectedItem = $itemId;
        $this->action = $action;
        
        if($action == 'edit') {
            $this->emit('getModalId', $this->selectedItem);
            $this->dispatchBrowserEvent('openEditModal');
        } else if($action == 'delete') {
            $this->dispatchBrowserEvent('openDeleteModal', ['itemId' => $this->selectedItem]);
        }
    }

    public function sortBy($field)
    {
        if ($this->sortDirection == 'asc') {
            $this->sortDirection = 'desc';
        } else {
            $this->sortDirection = 'asc';
        }

        return $this->sortBy = $field;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $employees = Employee::query()
            ->search($this->search)
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.employees-data-table', [
            'employees' => $employees
        ]);
    }
}
