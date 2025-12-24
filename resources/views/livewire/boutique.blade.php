<div class="grid md:grid-cols-3 gap-12">
    @if($boutiques->count() > 0)
        @foreach($boutiques as $index => $boutique)
            <div class="bg-[#f0ede5] p-8 rounded-xl border-2 border-[#004643]/20 hover:border-[#004643] hover:shadow-lg transition-all duration-500 transform hover:-translate-y-2 animate-float relative overflow-hidden group" style="animation-delay: {{ $index * 0.5 }}s;">
                <!-- Texture Pattern -->
                <div class="absolute inset-0 opacity-5 pointer-events-none">
                    <div class="absolute top-4 right-4 w-16 h-16 bg-[#004643] rounded-full"></div>
                    <div class="absolute bottom-4 left-4 w-12 h-12 bg-[#004643] rounded-full"></div>
                </div>
                <div class="w-12 h-12 bg-[#004643] rounded-lg flex items-center justify-center mb-6 animate-pulse-slow relative z-10">
                    <svg class="w-6 h-6 text-[#f0ede5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-4 text-[#004643] relative z-10">{{ $boutique->name }}</h3>
                <p class="text-[#004643]/80 mb-6 leading-relaxed relative z-10 text-base">{{ $boutique->description }}</p>
                <div class="flex justify-between items-center relative z-10 pt-4 border-t border-[#004643]/10">
                    <span class="text-2xl font-bold text-[#004643]">Rp {{ number_format($boutique->price, 0, ',', '.') }}</span>
                    <span class="text-base text-[#004643] bg-[#004643]/10 px-4 py-2 rounded-full border border-[#004643]/20 font-medium">{{ $boutique->category }}</span>
                </div>
            </div>
        @endforeach
    @else
        <div class="bg-[#f0ede5] p-8 rounded-xl border-2 border-[#004643]/20 hover:border-[#004643] hover:shadow-lg transition-all duration-500 transform hover:-translate-y-2 animate-float relative overflow-hidden group" style="animation-delay: 0.5s;">
            <div class="absolute inset-0 opacity-5 pointer-events-none">
                <div class="absolute top-4 right-4 w-16 h-16 bg-[#004643] rounded-full"></div>
                <div class="absolute bottom-4 left-4 w-12 h-12 bg-[#004643] rounded-full"></div>
            </div>
            <div class="w-12 h-12 bg-[#004643] rounded-lg flex items-center justify-center mb-6 animate-pulse-slow relative z-10">
                <svg class="w-6 h-6 text-[#f0ede5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <h3 class="text-xl font-semibold mb-4 text-[#004643] relative z-10">Masker Medis</h3>
            <p class="text-[#004643]/80 mb-6 leading-relaxed relative z-10 text-base">Masker medis berkualitas tinggi untuk perlindungan maksimal.</p>
            <div class="flex justify-between items-center relative z-10 pt-4 border-t border-[#004643]/10">
                <span class="text-2xl font-bold text-[#004643]">Rp 50.000</span>
                <span class="text-base text-[#004643] bg-[#004643]/10 px-4 py-2 rounded-full border border-[#004643]/20 font-medium">Perlengkapan</span>
            </div>
        </div>
        <div class="bg-[#f0ede5] p-8 rounded-xl border-2 border-[#004643]/20 hover:border-[#004643] hover:shadow-lg transition-all duration-500 transform hover:-translate-y-2 animate-float relative overflow-hidden group" style="animation-delay: 1.5s;">
            <div class="absolute inset-0 opacity-5 pointer-events-none">
                <div class="absolute top-4 right-4 w-16 h-16 bg-[#004643] rounded-full"></div>
                <div class="absolute bottom-4 left-4 w-12 h-12 bg-[#004643] rounded-full"></div>
            </div>
            <div class="w-12 h-12 bg-[#004643] rounded-lg flex items-center justify-center mb-6 animate-pulse-slow relative z-10">
                <svg class="w-6 h-6 text-[#f0ede5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                </svg>
            </div>
            <h3 class="text-xl font-semibold mb-4 text-[#004643] relative z-10">Suplemen Vitamin</h3>
            <p class="text-[#004643]/80 mb-6 leading-relaxed relative z-10 text-base">Koleksi suplemen vitamin lengkap untuk kesehatan optimal.</p>
            <div class="flex justify-between items-center relative z-10 pt-4 border-t border-[#004643]/10">
                <span class="text-2xl font-bold text-[#004643]">Rp 75.000</span>
                <span class="text-base text-[#004643] bg-[#004643]/10 px-4 py-2 rounded-full border border-[#004643]/20 font-medium">Suplemen</span>
            </div>
        </div>
        <div class="bg-[#f0ede5] p-8 rounded-xl border-2 border-[#004643]/20 hover:border-[#004643] hover:shadow-lg transition-all duration-500 transform hover:-translate-y-2 animate-float relative overflow-hidden group" style="animation-delay: 2.5s;">
            <div class="absolute inset-0 opacity-5 pointer-events-none">
                <div class="absolute top-4 right-4 w-16 h-16 bg-[#004643] rounded-full"></div>
                <div class="absolute bottom-4 left-4 w-12 h-12 bg-[#004643] rounded-full"></div>
            </div>
            <div class="w-12 h-12 bg-[#004643] rounded-lg flex items-center justify-center mb-6 animate-pulse-slow relative z-10">
                <svg class="w-6 h-6 text-[#f0ede5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                </svg>
            </div>
            <h3 class="text-xl font-semibold mb-4 text-[#004643] relative z-10">Alat Kesehatan</h3>
            <p class="text-[#004643]/80 mb-6 leading-relaxed relative z-10 text-base">Alat ukur kesehatan digital dengan teknologi canggih.</p>
            <div class="flex justify-between items-center relative z-10 pt-4 border-t border-[#004643]/10">
                <span class="text-2xl font-bold text-[#004643]">Rp 150.000</span>
                <span class="text-base text-[#004643] bg-[#004643]/10 px-4 py-2 rounded-full border border-[#004643]/20 font-medium">Alat Kesehatan</span>
            </div>
        </div>
    @endif
</div>

</div>
