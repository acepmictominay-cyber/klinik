<div class="grid md:grid-cols-3 gap-12">
    @if($medicines->count() > 0)
        @foreach($medicines as $index => $medicine)
            <div class="bg-white p-8 rounded-xl border border-gray-100 hover:border-green-200 hover:shadow-lg transition-all duration-500 transform hover:-translate-y-2 animate-float" style="animation-delay: {{ $index * 0.5 }}s;">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-6 animate-pulse-slow">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-4 text-gray-900">{{ $medicine->name }}</h3>
                <p class="text-gray-600 mb-4 leading-relaxed">{{ $medicine->description }}</p>
                <div class="flex justify-between items-center">
                    <span class="text-2xl font-semibold text-gray-900">Rp {{ number_format($medicine->price, 0, ',', '.') }}</span>
                    <span class="text-sm text-green-600 bg-green-50 px-3 py-1 rounded-full">Stok: {{ $medicine->stock }}</span>
                </div>
            </div>
        @endforeach
    @else
        <div class="bg-white p-8 rounded-xl border border-gray-100 hover:border-green-200 hover:shadow-lg transition-all duration-500 transform hover:-translate-y-2 animate-float" style="animation-delay: 0s;">
            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-6 animate-pulse-slow">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                </svg>
            </div>
            <h3 class="text-xl font-semibold mb-4 text-gray-900">Paracetamol</h3>
            <p class="text-gray-600 mb-4 leading-relaxed">Obat untuk mengurangi demam dan nyeri.</p>
            <div class="flex justify-between items-center">
                <span class="text-2xl font-semibold text-gray-900">Rp 5.000</span>
                <span class="text-sm text-green-600 bg-green-50 px-3 py-1 rounded-full">Stok: 50</span>
            </div>
        </div>
        <div class="bg-white p-8 rounded-xl border border-gray-100 hover:border-green-200 hover:shadow-lg transition-all duration-500 transform hover:-translate-y-2 animate-float" style="animation-delay: 1s;">
            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-6 animate-pulse-slow">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                </svg>
            </div>
            <h3 class="text-xl font-semibold mb-4 text-gray-900">Vitamin C</h3>
            <p class="text-gray-600 mb-4 leading-relaxed">Suplemen vitamin untuk meningkatkan daya tahan tubuh.</p>
            <div class="flex justify-between items-center">
                <span class="text-2xl font-semibold text-gray-900">Rp 15.000</span>
                <span class="text-sm text-green-600 bg-green-50 px-3 py-1 rounded-full">Stok: 30</span>
            </div>
        </div>
        <div class="bg-white p-8 rounded-xl border border-gray-100 hover:border-green-200 hover:shadow-lg transition-all duration-500 transform hover:-translate-y-2 animate-float" style="animation-delay: 2s;">
            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-6 animate-pulse-slow">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <h3 class="text-xl font-semibold mb-4 text-gray-900">Antibiotik</h3>
            <p class="text-gray-600 mb-4 leading-relaxed">Obat antibiotik untuk infeksi bakteri.</p>
            <div class="flex justify-between items-center">
                <span class="text-2xl font-semibold text-gray-900">Rp 25.000</span>
                <span class="text-sm text-green-600 bg-green-50 px-3 py-1 rounded-full">Stok: 20</span>
            </div>
        </div>
    @endif
</div>
