<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Appointment;
use Illuminate\Support\Facades\Session;

class FilterDate extends Component
{
    public $selectedDate;
    public $filteredAppointments = [];
    public $Appointments = [];
    public $filterData = false;

    public function mount()
    {
        // Load all appointments initially
        $this->filterData = false;
        $this->Appointments = Appointment::all();
    }

    public function filterAppointments()
    {
        // Filter appointments only if $selectedDate is not empty
        if ($this->selectedDate) {
            $filtered = Appointment::where('date', $this->selectedDate)->get();
            $this->filteredAppointments = $filtered;
            $this->filterData = true;
        }

        $this->emit('refreshComponent');
    }

    public function deleteAppointments($id)
    {
        $delete = Appointment::destroy($id);
        if ($delete) {
            Session::flash('success', 'Appointment deleted successfully.');
            $this->emit('refreshComponent');
        }
    }

    public function render()
    {
        return view('livewire.filter-date');
    }
}
