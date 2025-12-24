<div class="grid md:grid-cols-3 gap-12">
    @if($medicines->count() > 0)
        @foreach($medicines as $index => $medicine)
            <div class="bg-[#f0ede5] p-8 rounded-xl border-2 border-[#004643]/20 hover:border-[#004643] hover:shadow-lg transition-all duration-500 transform hover:-translate-y-2 animate-float relative overflow-hidden group" style="animation-delay: {{ $index * 0.5 }}s;">
                <!-- Texture Pattern -->
                <div class="absolute inset-0 opacity-5 pointer-events-none">
                    <div class="absolute top-4 right-4 w-16 h-16 bg-[#004643] rounded-full"></div>
                    <div class="absolute bottom-4 left-4 w-12 h-12 bg-[#004643] rounded-full"></div>
                </div>
                <div class="w-12 h-12 bg-[#004643] rounded-lg flex items-center justify-center mb-6 animate-pulse-slow relative z-10">
                    <svg class="w-6 h-6 text-[#f0ede5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-4 text-[#004643] relative z-10">{{ $medicine->name }}</h3>
                <p class="text-[#004643]/80 mb-6 leading-relaxed relative z-10 text-base">{{ $medicine->description }}</p>
                <div class="flex justify-between items-center relative z-10 pt-4 border-t border-[#004643]/10">
                    <span class="text-2xl font-bold text-[#004643]">Rp {{ number_format($medicine->price, 0, ',', '.') }}</span>
                    <span class="text-base text-[#004643] bg-[#004643]/10 px-4 py-2 rounded-full border border-[#004643]/20 font-medium">Stok: {{ $medicine->stock }}</span>
                </div>
            </div>
        @endforeach
    @else
        <div class="bg-[#f0ede5] p-8 rounded-xl border-2 border-[#004643]/20 hover:border-[#004643] hover:shadow-lg transition-all duration-500 transform hover:-translate-y-2 animate-float relative overflow-hidden group" style="animation-delay: 0s;">
            <div class="absolute inset-0 opacity-5 pointer-events-none">
                <div class="absolute top-4 right-4 w-16 h-16 bg-[#004643] rounded-full"></div>
                <div class="absolute bottom-4 left-4 w-12 h-12 bg-[#004643] rounded-full"></div>
            </div>
            <div class="w-12 h-12 bg-[#004643] rounded-lg flex items-center justify-center mb-6 animate-pulse-slow relative z-10">
                <svg class="w-6 h-6 text-[#f0ede5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                </svg>
            </div>
            <h3 class="text-xl font-semibold mb-4 text-[#004643] relative z-10">Paracetamol</h3>
            <p class="text-[#004643]/80 mb-6 leading-relaxed relative z-10 text-base">Obat untuk mengurangi demam dan nyeri.</p>
            <div class="flex justify-between items-center relative z-10 pt-4 border-t border-[#004643]/10">
                <span class="text-2xl font-bold text-[#004643]">Rp 5.000</span>
                <span class="text-base text-[#004643] bg-[#004643]/10 px-4 py-2 rounded-full border border-[#004643]/20 font-medium">Stok: 50</span>
            </div>
        </div>
        <div class="bg-[#f0ede5] p-8 rounded-xl border-2 border-[#004643]/20 hover:border-[#004643] hover:shadow-lg transition-all duration-500 transform hover:-translate-y-2 animate-float relative overflow-hidden group" style="animation-delay: 1s;">
            <div class="absolute inset-0 opacity-5 pointer-events-none">
                <div class="absolute top-4 right-4 w-16 h-16 bg-[#004643] rounded-full"></div>
                <div class="absolute bottom-4 left-4 w-12 h-12 bg-[#004643] rounded-full"></div>
            </div>
            <div class="w-12 h-12 bg-[#004643] rounded-lg flex items-center justify-center mb-6 animate-pulse-slow relative z-10">
                <svg class="w-6 h-6 text-[#f0ede5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                </svg>
            </div>
            <h3 class="text-xl font-semibold mb-4 text-[#004643] relative z-10">Vitamin C</h3>
            <p class="text-[#004643]/80 mb-6 leading-relaxed relative z-10 text-base">Suplemen vitamin untuk meningkatkan daya tahan tubuh.</p>
            <div class="flex justify-between items-center relative z-10 pt-4 border-t border-[#004643]/10">
                <span class="text-2xl font-bold text-[#004643]">Rp 15.000</span>
                <span class="text-base text-[#004643] bg-[#004643]/10 px-4 py-2 rounded-full border border-[#004643]/20 font-medium">Stok: 30</span>
            </div>
        </div>
        <div class="bg-[#f0ede5] p-8 rounded-xl border-2 border-[#004643]/20 hover:border-[#004643] hover:shadow-lg transition-all duration-500 transform hover:-translate-y-2 animate-float relative overflow-hidden group" style="animation-delay: 2s;">
            <div class="absolute inset-0 opacity-5 pointer-events-none">
                <div class="absolute top-4 right-4 w-16 h-16 bg-[#004643] rounded-full"></div>
                <div class="absolute bottom-4 left-4 w-12 h-12 bg-[#004643] rounded-full"></div>
            </div>
            <div class="w-12 h-12 bg-[#004643] rounded-lg flex items-center justify-center mb-6 animate-pulse-slow relative z-10">
                <svg class="w-6 h-6 text-[#f0ede5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <h3 class="text-xl font-semibold mb-4 text-[#004643] relative z-10">Antibiotik</h3>
            <p class="text-[#004643]/80 mb-6 leading-relaxed relative z-10 text-base">Obat antibiotik untuk infeksi bakteri.</p>
            <div class="flex justify-between items-center relative z-10 pt-4 border-t border-[#004643]/10">
                <span class="text-2xl font-bold text-[#004643]">Rp 25.000</span>
                <span class="text-base text-[#004643] bg-[#004643]/10 px-4 py-2 rounded-full border border-[#004643]/20 font-medium">Stok: 20</span>
            </div>
        </div>
    @endif
</div>

</div>
