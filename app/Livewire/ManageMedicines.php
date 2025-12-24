<?php

namespace App\Livewire;

use App\Models\Medicine;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ManageMedicines extends Component
{
    use WithFileUploads;

    public $medicines;
    public $name, $description, $price, $stock, $image;
    public $oldImage = null;
    public $editingId = null;
    public $isEditing = false;
    public $showSuccessModal = false;
    public $showModal = false;
    public $showDeleteModal = false;
    public $deletingId = null;

    public function mount()
    {
        $this->loadMedicines();
    }

    public function loadMedicines()
    {
        $this->medicines = Medicine::all();
    }

    public function create()
    {
        $this->resetForm();
        $this->isEditing = false;
        $this->showModal = true;
    }

    public function edit($id)
    {
        $medicine = Medicine::find($id);
        if (!$medicine) {
            session()->flash('error', 'Obat tidak ditemukan.');
            return;
        }
        // Reset form terlebih dahulu untuk memastikan state bersih
        $this->resetForm();
        $this->editingId = $id;
        $this->name = $medicine->name;
        $this->description = $medicine->description;
        $this->price = $medicine->price;
        $this->stock = $medicine->stock;
        $this->oldImage = $medicine->image;
        $this->image = null;
        $this->isEditing = true;
        $this->showModal = true;
    }

    public function save()
    {
        $rules = [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ];

        // Validasi image hanya jika ada file baru yang di-upload dan file valid
        if ($this->image && $this->image->isValid()) {
            $rules['image'] = 'image|max:2048';
        }

        $this->validate($rules);

        $data = [
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'stock' => $this->stock,
        ];

        // Handle image upload
        // Periksa apakah ada file baru yang di-upload
        if ($this->image) {
            // Pastikan file valid
            if (is_object($this->image) && method_exists($this->image, 'isValid') && $this->image->isValid()) {
                // Hapus gambar lama jika ada
                if ($this->oldImage && Storage::disk('public')->exists($this->oldImage)) {
                    Storage::disk('public')->delete($this->oldImage);
                }
                // Store gambar baru
                $data['image'] = $this->image->store('medicines', 'public');
            } elseif (is_string($this->image)) {
                // Jika image adalah string (path), gunakan langsung
                $data['image'] = $this->image;
            }
        } elseif ($this->isEditing && $this->oldImage) {
            // Jika tidak ada gambar baru, pertahankan gambar lama
            $data['image'] = $this->oldImage;
        }

        if ($this->isEditing) {
            Medicine::find($this->editingId)->update($data);
        } else {
            Medicine::create($data);
        }

        $this->resetForm();
        $this->loadMedicines();
        $this->showSuccessModal = true;
        $this->dispatch('file-upload-reset');
    }

    public function confirmDelete($id)
    {
        $this->deletingId = $id;
        $this->showDeleteModal = true;
    }

    public function delete()
    {
        if ($this->deletingId) {
            $medicine = Medicine::find($this->deletingId);
            if ($medicine) {
                // Hapus gambar jika ada
                if ($medicine->image && Storage::disk('public')->exists($medicine->image)) {
                    Storage::disk('public')->delete($medicine->image);
                }
                $medicine->delete();
                $this->loadMedicines();
                session()->flash('message', 'Obat berhasil dihapus.');
            }
        }
        $this->closeDeleteModal();
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
        $this->stock = '';
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
        return view('livewire.manage-medicines');
    }
}

