<?php

namespace App\Livewire;

use App\Models\Boutique as BoutiqueModel;
use Livewire\Component;

class Boutique extends Component
{
    public function render()
    {
        // Gunakan data dummy karena tabel boutiques tidak ada di database
        $boutiques = collect([
            (object) ['name' => 'Masker Medis', 'description' => 'Masker medis berkualitas tinggi untuk perlindungan kesehatan.', 'price' => 50000, 'category' => 'Perlengkapan'],
            (object) ['name' => 'Suplemen Vitamin', 'description' => 'Suplemen vitamin lengkap untuk kesehatan optimal.', 'price' => 75000, 'category' => 'Suplemen'],
            (object) ['name' => 'Alat Ukur Tekanan Darah', 'description' => 'Alat ukur tekanan darah digital akurat.', 'price' => 150000, 'category' => 'Alat Kesehatan'],
        ]);
        return view('livewire.boutique', compact('boutiques'));
    }
}
