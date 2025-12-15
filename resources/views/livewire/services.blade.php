<div>
    @if($services->count() > 0)
        <div class="grid md:grid-cols-3 gap-8">
            @foreach($services as $service)
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-4">{{ $service->name }}</h3>
                    <p class="text-gray-600 mb-4">{{ $service->description }}</p>
                    @if($service->price)
                        <p class="text-gray-600 font-semibold">Harga: Rp {{ number_format($service->price, 0, ',', '.') }}</p>
                    @endif
                </div>
            @endforeach
        </div>
    @else
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">Konsultasi Umum</h3>
                <p class="text-gray-600">Layanan konsultasi kesehatan umum untuk semua keluarga.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">Pemeriksaan Khusus</h3>
                <p class="text-gray-600">Pemeriksaan kesehatan spesialis sesuai kebutuhan.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">Vaksinasi</h3>
                <p class="text-gray-600">Layanan vaksinasi untuk mencegah berbagai penyakit.</p>
            </div>
        </div>
    @endif
</div>
