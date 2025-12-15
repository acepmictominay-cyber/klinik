<?php

namespace App\Livewire;

use App\Models\Service;
use Livewire\Component;

class Services extends Component
{
    public function render()
    {
        // Gunakan data dummy karena tabel services tidak ada di database
        $services = collect([
            (object) ['name' => 'Konsultasi Umum', 'description' => 'Layanan konsultasi kesehatan umum untuk semua keluarga.', 'price' => 50000],
            (object) ['name' => 'Pemeriksaan Khusus', 'description' => 'Pemeriksaan kesehatan spesialis sesuai kebutuhan.', 'price' => 100000],
            (object) ['name' => 'Vaksinasi', 'description' => 'Layanan vaksinasi untuk mencegah berbagai penyakit.', 'price' => 75000],
        ]);
        return view('livewire.services', compact('services'));
    }
}
