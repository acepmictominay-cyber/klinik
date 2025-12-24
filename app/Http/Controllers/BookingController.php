<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pasien' => 'required|string|max:255',
            'keluhan' => 'required|string',
            'nomor_handphone' => 'required|string|max:20',
            'doctor_id' => 'required|exists:doctors,id',
            'jam' => 'required|string',
        ]);

        // Generate unique patient ID (same format as Livewire Doctors component)
        $lastPatient = Patient::latest('id')->first();
        $nextId = $lastPatient ? $lastPatient->id + 1 : 1;
        $idPasien = 'PAT-' . str_pad($nextId, 3, '0', STR_PAD_LEFT);

        Patient::create([
            'nama_pasien' => $validated['nama_pasien'],
            'id_pasien' => $idPasien,
            'keluhan' => $validated['keluhan'],
            'nomor_handphone' => $validated['nomor_handphone'],
            'doctor_id' => $validated['doctor_id'],
            'jam' => $validated['jam'],
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Pendaftaran berhasil! Kami akan menghubungi Anda segera.');
    }
}

