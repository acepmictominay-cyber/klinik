<?php

namespace App\Livewire;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ManageServices extends Component
{
    use WithFileUploads;

    public $services;
    public $name, $description, $price, $image;
    public $oldImage = null;
    public $editingId = null;
    public $isEditing = false;
    public $showSuccessModal = false;
    public $showModal = false;
    public $showDeleteModal = false;
    public $deletingId = null;

    public function mount()
    {
        $this->loadServices();
    }

    public function loadServices()
    {
        $this->services = Service::all();
    }

    public function create()
    {
        $this->resetForm();
        $this->isEditing = false;
        $this->showModal = true;
    }

    public function edit($id)
    {
        $service = Service::find($id);
        if (!$service) {
            session()->flash('error', 'Layanan tidak ditemukan.');
            return;
        }
        $this->editingId = $id;
        $this->name = $service->name;
        $this->description = $service->description;
        $this->price = $service->price;
        $this->oldImage = $service->image;
        $this->image = null;
        $this->isEditing = true;
        $this->showModal = true;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
        ]);

        $data = [
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
        ];

        if ($this->image) {
            // Hapus gambar lama jika ada
            if ($this->oldImage && Storage::disk('public')->exists($this->oldImage)) {
                Storage::disk('public')->delete($this->oldImage);
            }
            $data['image'] = $this->image->store('services', 'public');
        } elseif ($this->isEditing && $this->oldImage) {
            // Jika tidak ada gambar baru, pertahankan gambar lama
            $data['image'] = $this->oldImage;
        }

        if ($this->isEditing) {
            Service::find($this->editingId)->update($data);
        } else {
            Service::create($data);
        }

        $this->resetForm();
        $this->loadServices();
        $this->showSuccessModal = true;
        $this->dispatch('file-upload-reset');
    }

    public function confirmDelete($id)
    {
        $this->deletingId = $id;
        $this->showDeleteModal = true;
        $this->dispatch('scroll-to-top');
    }

    public function delete()
    {
        // Simpan ID yang akan dihapus
        $deletingId = $this->deletingId;
        
        // Reset state delete modal TERLEBIH DAHULU agar button tidak terblokir
        $this->showDeleteModal = false;
        $this->deletingId = null;
        
        // Lakukan delete setelah state di-reset
        if ($deletingId) {
            $service = Service::find($deletingId);
            if ($service) {
                // Hapus gambar jika ada
                if ($service->image && Storage::disk('public')->exists($service->image)) {
                    Storage::disk('public')->delete($service->image);
                }
                $service->delete();
                session()->flash('message', 'Layanan berhasil dihapus.');
            }
        }
        
        // Load ulang data setelah delete
        $this->loadServices();
    }

    public function closeDeleteModal()
    {
        $this->showDeleteModal = false;
        $this->deletingId = null;
    }

    public function resetForm()
    {
        $this->name = '';
        $this->description = '';
        $this->price = '';
        $this->image = null;
        $this->oldImage = null;
        $this->editingId = null;
        $this->isEditing = false;
        $this->showSuccessModal = false;
        $this->showModal = false;
    }

    public function closeModal()
    {
        $this->showSuccessModal = false;
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.manage-services');
    }
}

