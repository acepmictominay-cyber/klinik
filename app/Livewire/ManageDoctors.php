<?php

namespace App\Livewire;

use App\Models\Doctor;
use Livewire\Component;
use Livewire\WithFileUploads;

class ManageDoctors extends Component
{
    use WithFileUploads;

    public $doctors;
    public $nama, $spesialisasi, $deskripsi, $foto, $gambar, $no_telepon;
    public $operating_hours = [];
    public $selected_days = [];
    public $editingId = null;
    public $isEditing = false;
    public $showSuccessModal = false;

    public function mount()
    {
        $this->loadDoctors();
    }

    public function loadDoctors()
    {
        $this->doctors = Doctor::all();
    }

    public function updatedSelectedDays()
    {
        // Ensure selected_days are ints
        $this->selected_days = array_map('intval', $this->selected_days);
        // Remove hours for unselected days
        $this->operating_hours = array_intersect_key($this->operating_hours, array_flip($this->selected_days));
        // Add empty hours for newly selected days
        foreach ($this->selected_days as $day) {
            if (!isset($this->operating_hours[$day])) {
                $this->operating_hours[$day] = ['start' => '08:00', 'end' => '17:00'];
            }
        }
    }

    public function create()
    {
        $this->resetForm();
        $this->isEditing = false;
    }

    public function edit($id)
    {
        $doctor = Doctor::find($id);
        $this->editingId = $id;
        $this->nama = $doctor->nama;
        $this->spesialisasi = $doctor->spesialisasi;
        $this->deskripsi = $doctor->deskripsi;
        $this->no_telepon = $doctor->no_telepon;
        $this->operating_hours = $doctor->operating_hours ?? [];
        $this->selected_days = array_map('intval', array_keys($this->operating_hours));
        $this->foto = null;
        $this->gambar = null;
        $this->isEditing = true;
        $this->dispatch('scroll-to-form');
    }

    public function save()
    {
        $this->validate([
            'nama' => 'required',
            'spesialisasi' => 'required',
        ]);

        $data = [
            'nama' => $this->nama,
            'spesialisasi' => $this->spesialisasi,
            'deskripsi' => $this->deskripsi,
            'no_telepon' => $this->no_telepon,
            'operating_hours' => $this->operating_hours,
        ];

        if ($this->foto) {
            $data['foto'] = $this->foto->store('doctors', 'public');
        }

        if ($this->gambar) {
            $data['gambar'] = $this->gambar->store('doctors', 'public');
        }

        if ($this->isEditing) {
            Doctor::find($this->editingId)->update($data);
        } else {
            Doctor::create($data);
        }

        $this->resetForm();
        $this->loadDoctors();
        $this->showSuccessModal = true;
    }

    public function delete($id)
    {
        Doctor::find($id)->delete();
        $this->loadDoctors();
        session()->flash('message', 'Dokter berhasil dihapus.');
    }

    public function resetForm()
    {
        $this->nama = '';
        $this->spesialisasi = '';
        $this->deskripsi = '';
        $this->no_telepon = '';
        $this->operating_hours = [];
        $this->selected_days = [];
        $this->foto = null;
        $this->gambar = null;
        $this->editingId = null;
        $this->isEditing = false;
        $this->showSuccessModal = false;
    }

    public function closeModal()
    {
        $this->showSuccessModal = false;
    }

    public function render()
    {
        return view('livewire.manage-doctors');
    }
}
