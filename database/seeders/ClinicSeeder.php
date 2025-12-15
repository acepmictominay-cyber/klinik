<?php

namespace Database\Seeders;

use App\Models\ClinicProfile;
use App\Models\Service;
use App\Models\Medicine;
use App\Models\Boutique;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClinicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClinicProfile::create([
            'name' => 'Klinik Sehat',
            'address' => 'Jl. Kesehatan No. 123, Jakarta',
            'phone' => '021-12345678',
            'email' => 'info@kliniksehat.com',
            'description' => 'Klinik Sehat adalah pusat kesehatan terdepan yang menyediakan layanan medis berkualitas tinggi dengan pendekatan holistik untuk kesehatan pasien.',
        ]);

        Service::create([
            'name' => 'Konsultasi Umum',
            'description' => 'Layanan konsultasi kesehatan umum untuk semua keluarga.',
            'price' => 50000,
        ]);

        Service::create([
            'name' => 'Pemeriksaan Khusus',
            'description' => 'Pemeriksaan kesehatan spesialis sesuai kebutuhan.',
            'price' => 100000,
        ]);

        Service::create([
            'name' => 'Vaksinasi',
            'description' => 'Layanan vaksinasi untuk mencegah berbagai penyakit.',
            'price' => 75000,
        ]);

        \App\Models\Doctor::create([
            'nama' => 'Dr. Ahmad Santoso',
            'spesialisasi' => 'Spesialis Jantung',
            'jadwal' => 'Senin - Jumat: 08:00 - 16:00',
            'deskripsi' => 'Dokter spesialis jantung dengan pengalaman 10 tahun.',
        ]);

        \App\Models\Doctor::create([
            'nama' => 'Dr. Siti Nurhaliza',
            'spesialisasi' => 'Spesialis Anak',
            'jadwal' => 'Selasa - Sabtu: 09:00 - 17:00',
            'deskripsi' => 'Dokter spesialis anak yang ramah dan berpengalaman.',
        ]);

        \App\Models\Doctor::create([
            'nama' => 'Dr. Budi Prasetyo',
            'spesialisasi' => 'Spesialis Umum',
            'jadwal' => 'Senin - Sabtu: 07:00 - 15:00',
            'deskripsi' => 'Dokter umum yang siap membantu kesehatan keluarga Anda.',
        ]);

        \App\Models\Doctor::create([
            'nama' => 'Dr. Maya Sari',
            'spesialisasi' => 'Spesialis Kulit',
            'jadwal' => 'Rabu - Jumat: 13:00 - 19:00',
            'deskripsi' => 'Dokter spesialis kulit dengan keahlian dermatologi.',
        ]);

        \App\Models\Doctor::create([
            'nama' => 'Dr. Rudi Hartono',
            'spesialisasi' => 'Spesialis Mata',
            'jadwal' => 'Selasa - Kamis: 11:00 - 17:00',
            'deskripsi' => 'Dokter spesialis mata dengan keahlian oftalmologi.',
        ]);

        Medicine::create([
            'name' => 'Paracetamol',
            'description' => 'Obat untuk mengurangi demam dan nyeri.',
            'price' => 5000,
            'stock' => 50,
        ]);

        Medicine::create([
            'name' => 'Vitamin C',
            'description' => 'Suplemen vitamin untuk meningkatkan daya tahan tubuh.',
            'price' => 15000,
            'stock' => 30,
        ]);

        Medicine::create([
            'name' => 'Antibiotik',
            'description' => 'Obat antibiotik untuk infeksi bakteri.',
            'price' => 25000,
            'stock' => 20,
        ]);

        Boutique::create([
            'name' => 'Masker Medis',
            'description' => 'Masker medis berkualitas tinggi untuk perlindungan kesehatan.',
            'price' => 50000,
            'category' => 'Perlengkapan',
        ]);

        Boutique::create([
            'name' => 'Suplemen Vitamin',
            'description' => 'Suplemen vitamin lengkap untuk kesehatan optimal.',
            'price' => 75000,
            'category' => 'Suplemen',
        ]);

        Boutique::create([
            'name' => 'Alat Ukur Tekanan Darah',
            'description' => 'Alat ukur tekanan darah digital akurat.',
            'price' => 150000,
            'category' => 'Alat Kesehatan',
        ]);
    }
}
