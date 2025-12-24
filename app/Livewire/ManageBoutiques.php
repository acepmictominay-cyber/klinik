<?php

namespace App\Livewire;

use App\Models\Boutique;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ManageBoutiques extends Component
{
    use WithFileUploads;

    public $boutiques;
    public $name, $description, $price, $category, $image;
    public $oldImage = null;
    public $editingId = null;
    public $isEditing = false;
    public $showSuccessModal = false;
    public $showModal = false;
    public $showDeleteModal = false;
    public $deletingId = null;

    public function mount()
    {
        $this->loadBoutiques();
    }

    public function loadBoutiques()
    {
        $this->boutiques = Boutique::all();
    }

    public function create()
    {
        $this->resetForm();
        $this->isEditing = false;
        $this->showModal = true;
    }

    public function edit($id)
    {
        $boutique = Boutique::find($id);
        if (!$boutique) {
            session()->flash('error', 'Butik tidak ditemukan.');
            return;
        }
        $this->editingId = $id;
        $this->name = $boutique->name;
        $this->description = $boutique->description;
        $this->price = $boutique->price;
        $this->category = $boutique->category;
        $this->oldImage = $boutique->image;
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
            'category' => 'required',
        ]);

        $data = [
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'category' => $this->category,
        ];

        if ($this->image) {
            // Hapus gambar lama jika ada
            if ($this->oldImage && Storage::disk('public')->exists($this->oldImage)) {
                Storage::disk('public')->delete($this->oldImage);
            }
            $data['image'] = $this->image->store('boutiques', 'public');
        } elseif ($this->isEditing && $this->oldImage) {
            // Jika tidak ada gambar baru, pertahankan gambar lama
            $data['image'] = $this->oldImage;
        }

        if ($this->isEditing) {
            Boutique::find($this->editingId)->update($data);
        } else {
            Boutique::create($data);
        }

        $this->resetForm();
        $this->loadBoutiques();
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
            $boutique = Boutique::find($this->deletingId);
            if ($boutique) {
                // Hapus gambar jika ada
                if ($boutique->image && Storage::disk('public')->exists($boutique->image)) {
                    Storage::disk('public')->delete($boutique->image);
                }
                $boutique->delete();
                $this->loadBoutiques();
                session()->flash('message', 'Butik berhasil dihapus.');
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
        $this->category = '';
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
        return view('livewire.manage-boutiques');
    }
}

