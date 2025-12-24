@php $doctors = collect($doctors)->take(6); @endphp

<!-- Single root element for Livewire component -->
<div>
    <!-- Flash Messages -->
    @if (session()->has('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
            {{ session('error') }}
        </div>
    @endif

    <div class="grid grid-cols-3 gap-8 {{ $showModal ? 'pointer-events-none opacity-50' : '' }} transition-all duration-300">
        @foreach($doctors as $index => $doctor)
            <div class="group relative bg-[#004643] rounded-[10px] border border-[#004643] hover:border-[#003d3a] hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 animate-float overflow-hidden" style="animation-delay: {{ $index * 0.1 }}s;">
                <!-- Background Pattern -->
                <div class="absolute inset-0 bg-gradient-to-br from-[#003d3a]/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                <!-- Content -->
                <div class="relative p-6">
                    <!-- Doctor Photo -->
                    <div class="relative mb-6">
                        <div class="w-24 h-24 mx-auto bg-gradient-to-br from-[#f0ede5]/20 to-[#f0ede5]/30 rounded-full flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-500">
                            @if($doctor->foto || $doctor->gambar)
                                <img src="{{ asset('storage/' . ($doctor->foto ?: $doctor->gambar)) }}" alt="{{ $doctor->nama }}" class="w-full h-full rounded-full object-cover">
                            @else
                                <svg class="w-12 h-12 text-[#f0ede5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            @endif
                        </div>
                        <!-- Premium Badge -->
                        <div class="absolute -top-2 -right-2 w-6 h-6 bg-gradient-to-r from-amber-400 to-yellow-500 rounded-full flex items-center justify-center shadow-lg animate-pulse-slow">
                            <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        </div>
                    </div>

                    <!-- Doctor Info -->
                    <div class="text-center mb-6">
                        <h3 class="text-xl font-bold text-[#f0ede5] font-['Poppins'] mb-3">{{ $doctor->nama }}</h3>
                        <div class="inline-flex items-center px-4 py-1.5 bg-[#f0ede5]/20 text-[#f0ede5] rounded-full text-sm font-semibold mb-4">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                            {{ $doctor->spesialisasi }}
                        </div>
                        @if($doctor->deskripsi)
                            <p class="text-[#f0ede5]/90 text-base leading-relaxed mb-4 px-2">{{ $doctor->deskripsi }}</p>
                        @else
                            <p class="text-[#f0ede5]/90 text-base leading-relaxed mb-4 px-2">Dokter spesialis dengan pengalaman dan keahlian dalam bidang kesehatan.</p>
                        @endif
                    </div>

                    <!-- Schedule -->
                    <div class="bg-[#f0ede5] rounded-lg p-5 border border-[#f0ede5]/20 mb-4">
                        <div class="text-sm text-[#004643] text-center">
                            @if($doctor->operating_hours && count($doctor->operating_hours) > 0)
                                @php
                                    $days = [
                                        1 => 'Senin',
                                        2 => 'Selasa',
                                        3 => 'Rabu',
                                        4 => 'Kamis',
                                        5 => 'Jumat',
                                        6 => 'Sabtu',
                                        7 => 'Minggu'
                                    ];
                                @endphp
                                <div class="space-y-2">
                                    @foreach($doctor->operating_hours as $day => $hours)
                                        <div class="text-sm">
                                            <span class="font-semibold">{{ $days[$day] ?? 'Hari' }}:</span>
                                            <span class="ml-2">{{ $hours['start'] ?? '00:00' }} - {{ $hours['end'] ?? '00:00' }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            @elseif($doctor->jadwal)
                                <div class="font-semibold text-[#004643] mb-2">{{ $doctor->jadwal }}</div>
                            @else
                                <div class="font-semibold text-[#004643] mb-2">Senin - Jumat</div>
                                <div class="text-[#004643]">08:00 - 16:00</div>
                            @endif
                        </div>
                    </div>

                    <!-- Booking Button -->
                    <button wire:click="openBookingModal({{ $doctor->id }})" class="w-full inline-flex items-center justify-center px-4 py-3 bg-[#f0ede5] text-[#004643] font-semibold rounded-lg hover:bg-[#f0ede5]/90 transition-colors duration-300 text-base">
                        <svg class="w-3 h-3 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        Booking Jadwal
                    </button>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Booking Modal -->
    @if($showModal)
        <div class="fixed inset-0 bg-black/30 flex items-center justify-center">
            <div class="bg-[#f0ede5] rounded-lg p-6 w-full max-w-md mx-4 relative" style="z-index: 1000000 !important;">
                <button wire:click="closeModal" class="absolute top-4 right-4 text-[#004643]/60 hover:text-[#004643]">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
                <h3 class="text-lg font-bold text-[#004643] mb-4 pr-8">Booking Jadwal dengan {{ $selectedDoctor->nama }}</h3>

                <form wire:submit.prevent="validatePhone" class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-[#004643] mb-2 text-left">Nama Pasien</label>
                        <input type="text" wire:model="nama_pasien" class="w-full px-4 py-3 border border-[#004643]/30 rounded-xl focus:ring-2 focus:ring-[#004643] focus:border-[#004643] transition-all bg-white text-[#004643]" placeholder="Masukkan nama lengkap" required>
                        @error('nama_pasien') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-[#004643] mb-2 text-left">Keluhan</label>
                        <textarea wire:model="keluhan" rows="3" class="w-full px-4 py-3 border border-[#004643]/30 rounded-xl focus:ring-2 focus:ring-[#004643] focus:border-[#004643] transition-all bg-white text-[#004643]" placeholder="Jelaskan keluhan atau gejala yang dirasakan" required></textarea>
                        @error('keluhan') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-[#004643] mb-2 text-left">Nomor Handphone</label>
                        <input type="text" wire:model="nomor_handphone" class="w-full px-4 py-3 border border-[#004643]/30 rounded-xl focus:ring-2 focus:ring-[#004643] focus:border-[#004643] transition-all bg-white text-[#004643]" placeholder="Contoh: 081234567890 atau +6281234567890" required>
                        @error('nomor_handphone') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                    </div>
                    <div class="flex space-x-3 pt-4">
                        <button type="button" wire:click="closeModal" class="flex-1 inline-flex items-center justify-center px-4 py-3 bg-[#004643]/20 text-[#004643] font-medium rounded-xl hover:bg-[#004643]/30 transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Batal
                        </button>
                        <button type="submit" class="flex-1 inline-flex items-center justify-center px-4 py-3 bg-[#004643] text-[#f0ede5] font-medium rounded-xl hover:bg-[#003d3a] transition-all shadow-lg">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div> <!-- End single root element -->
