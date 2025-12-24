<?php

namespace App\Livewire;

use App\Models\Patient;
use Livewire\Component;

class ManagePatients extends Component
{
    public $patients;
    public $pendingCount;

    public function mount()
    {
        $this->loadPatients();
    }

    public function loadPatients()
    {
        $this->patients = Patient::with('doctor')->orderBy('created_at', 'desc')->get();
        $this->pendingCount = Patient::where('status', 'pending')->count();
    }

    public function updateStatus($id, $status)
    {
        Patient::find($id)->update(['status' => $status]);
        $this->loadPatients();
        session()->flash('message', 'Status pasien berhasil diperbarui.');
    }

    public function render()
    {
        return view('livewire.manage-patients');
    }
}
