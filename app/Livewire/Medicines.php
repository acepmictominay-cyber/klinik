<?php

namespace App\Livewire;

use App\Models\Medicine;
use Livewire\Component;

class Medicines extends Component
{
    public function render()
    {
        // Gunakan data dummy karena tabel medicines tidak ada di database
        $medicines = collect([
            (object) ['name' => 'Paracetamol', 'description' => 'Obat untuk mengurangi demam dan nyeri.', 'price' => 5000, 'stock' => 50],
            (object) ['name' => 'Vitamin C', 'description' => 'Suplemen vitamin untuk meningkatkan daya tahan tubuh.', 'price' => 15000, 'stock' => 30],
            (object) ['name' => 'Antibiotik', 'description' => 'Obat antibiotik untuk infeksi bakteri.', 'price' => 25000, 'stock' => 20],
        ]);
        return view('livewire.medicines', compact('medicines'));
    }
}
