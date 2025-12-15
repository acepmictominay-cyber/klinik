<?php

namespace App\Livewire;

use App\Models\Doctor;
use Livewire\Component;

class Doctors extends Component
{
    public function render()
    {
        $doctors = Doctor::all();
        return view('livewire.doctors', compact('doctors'));
    }
}
