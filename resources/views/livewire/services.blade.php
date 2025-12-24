<div>
    @if($services->count() > 0)
        <div class="grid md:grid-cols-3 gap-8">
            @foreach($services as $index => $service)
                <div class="card-hover bg-[#f0ede5] p-6 rounded-xl shadow-lg border border-[#004643]/20 relative overflow-hidden group" style="animation-delay: {{ $index * 0.1 }}s;">
                    <!-- Texture Pattern -->
                    <div class="absolute inset-0 opacity-5 pointer-events-none">
                        <div class="absolute top-4 right-4 w-16 h-16 bg-[#004643] rounded-full"></div>
                        <div class="absolute bottom-4 left-4 w-12 h-12 bg-[#004643] rounded-full"></div>
                    </div>
                    <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-[#004643]/10 to-[#003d3a]/10 rounded-bl-full transform translate-x-10 translate-y-10 group-hover:translate-x-0 group-hover:translate-y-0 transition-all duration-500"></div>
                    <div class="relative z-10">
                        <div class="w-12 h-12 bg-gradient-to-br from-[#004643] to-[#003d3a] rounded-lg flex items-center justify-center mb-4 transform group-hover:rotate-6 group-hover:scale-110 transition-all duration-300">
                            <svg class="w-6 h-6 text-[#f0ede5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-4 text-[#004643] group-hover:text-[#003d3a] transition-colors duration-300">{{ $service->name }}</h3>
                        <p class="text-[#004643]/80 mb-6 leading-relaxed text-base">{{ $service->description }}</p>
                        @if($service->price)
                            <div class="flex items-center justify-between pt-5 border-t border-[#004643]/20">
                                <span class="text-base font-medium text-[#004643]/80">Harga</span>
                                <p class="text-xl font-bold text-[#004643]">Rp {{ number_format($service->price, 0, ',', '.') }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="grid md:grid-cols-3 gap-8">
            <div class="card-hover bg-[#f0ede5] p-6 rounded-xl shadow-lg border border-[#004643]/20 relative overflow-hidden group">
                <!-- Texture Pattern -->
                <div class="absolute inset-0 opacity-5 pointer-events-none">
                    <div class="absolute top-4 right-4 w-16 h-16 bg-[#004643] rounded-full"></div>
                    <div class="absolute bottom-4 left-4 w-12 h-12 bg-[#004643] rounded-full"></div>
                </div>
                <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-[#004643]/10 to-[#003d3a]/10 rounded-bl-full transform translate-x-10 translate-y-10 group-hover:translate-x-0 group-hover:translate-y-0 transition-all duration-500"></div>
                <div class="relative z-10">
                    <div class="w-12 h-12 bg-gradient-to-br from-[#004643] to-[#003d3a] rounded-lg flex items-center justify-center mb-4 transform group-hover:rotate-6 group-hover:scale-110 transition-all duration-300">
                        <svg class="w-6 h-6 text-[#f0ede5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-4 text-[#004643] group-hover:text-[#003d3a] transition-colors duration-300">Konsultasi Umum</h3>
                    <p class="text-[#004643]/80 leading-relaxed text-base mb-6">Layanan konsultasi kesehatan umum untuk semua keluarga.</p>
                </div>
            </div>
            <div class="card-hover bg-[#f0ede5] p-6 rounded-xl shadow-lg border border-[#004643]/20 relative overflow-hidden group">
                <!-- Texture Pattern -->
                <div class="absolute inset-0 opacity-5 pointer-events-none">
                    <div class="absolute top-4 right-4 w-16 h-16 bg-[#004643] rounded-full"></div>
                    <div class="absolute bottom-4 left-4 w-12 h-12 bg-[#004643] rounded-full"></div>
                </div>
                <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-[#004643]/10 to-[#003d3a]/10 rounded-bl-full transform translate-x-10 translate-y-10 group-hover:translate-x-0 group-hover:translate-y-0 transition-all duration-500"></div>
                <div class="relative z-10">
                    <div class="w-12 h-12 bg-gradient-to-br from-[#004643] to-[#003d3a] rounded-lg flex items-center justify-center mb-4 transform group-hover:rotate-6 group-hover:scale-110 transition-all duration-300">
                        <svg class="w-6 h-6 text-[#f0ede5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-4 text-[#004643] group-hover:text-[#003d3a] transition-colors duration-300">Pemeriksaan Khusus</h3>
                    <p class="text-[#004643]/80 leading-relaxed text-base mb-6">Pemeriksaan kesehatan spesialis sesuai kebutuhan.</p>
                </div>
            </div>
            <div class="card-hover bg-[#f0ede5] p-6 rounded-xl shadow-lg border border-[#004643]/20 relative overflow-hidden group">
                <!-- Texture Pattern -->
                <div class="absolute inset-0 opacity-5 pointer-events-none">
                    <div class="absolute top-4 right-4 w-16 h-16 bg-[#004643] rounded-full"></div>
                    <div class="absolute bottom-4 left-4 w-12 h-12 bg-[#004643] rounded-full"></div>
                </div>
                <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-[#004643]/10 to-[#003d3a]/10 rounded-bl-full transform translate-x-10 translate-y-10 group-hover:translate-x-0 group-hover:translate-y-0 transition-all duration-500"></div>
                <div class="relative z-10">
                    <div class="w-12 h-12 bg-gradient-to-br from-[#004643] to-[#003d3a] rounded-lg flex items-center justify-center mb-4 transform group-hover:rotate-6 group-hover:scale-110 transition-all duration-300">
                        <svg class="w-6 h-6 text-[#f0ede5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-4 text-[#004643] group-hover:text-[#003d3a] transition-colors duration-300">Vaksinasi</h3>
                    <p class="text-[#004643]/80 leading-relaxed text-base mb-6">Layanan vaksinasi untuk mencegah berbagai penyakit.</p>
                </div>
            </div>
        </div>
    @endif
</div>
