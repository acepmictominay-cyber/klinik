<?php

namespace App\Livewire;

use App\Models\Doctor;
use App\Models\Patient;
use Livewire\Component;

class Doctors extends Component
{
    public $showModal = false;
    public $selectedDoctor = null;
    public $nama_pasien = '';
    public $keluhan = '';
    public $nomor_handphone = '';

    public function openBookingModal($doctorId)
    {
        $this->selectedDoctor = Doctor::find($doctorId);
        if ($this->selectedDoctor) {
            $this->showModal = true;
            $this->resetForm();
        }
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->nama_pasien = '';
        $this->keluhan = '';
        $this->nomor_handphone = '';
    }

    public function validatePhone()
    {
        // Indonesian phone number validation (08xx or +62xx)
        $pattern = '/^(?:\+62|0)[8-9][0-9]{7,11}$/';
        $this->phoneValid = preg_match($pattern, $this->nomor_handphone);
        if ($this->phoneValid) {
            $this->submitBooking();
        } else {
            session()->flash('error', 'Format nomor handphone tidak valid. Gunakan format 08xx atau +62xx.');
        }
    }


    public function submitBooking()
    {
        $this->validate([
            'nama_pasien' => 'required|string|max:255',
            'keluhan' => 'required|string',
            'nomor_handphone' => 'required|string',
        ]);

        // Generate unique patient ID
        $lastPatient = Patient::latest('id')->first();
        $nextId = $lastPatient ? $lastPatient->id + 1 : 1;
        $id_pasien = 'PAT-' . str_pad($nextId, 3, '0', STR_PAD_LEFT);

        Patient::create([
            'nama_pasien' => $this->nama_pasien,
            'id_pasien' => $id_pasien,
            'keluhan' => $this->keluhan,
            'nomor_handphone' => $this->nomor_handphone,
            'doctor_id' => $this->selectedDoctor->id,
            'status' => 'pending',
        ]);

        session()->flash('success', 'Booking jadwal berhasil! Admin akan menghubungi Anda via WhatsApp.');
        $this->closeModal();
    }

    public function render()
    {
        $doctors = Doctor::all();
        return view('livewire.doctors', compact('doctors'));
    }
}
