<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    @foreach($doctors as $index => $doctor)
        <div class="group relative bg-white rounded-2xl border border-gray-100 hover:border-blue-200 hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 animate-float overflow-hidden" style="animation-delay: {{ $index * 0.1 }}s;">
            <!-- Background Pattern -->
            <div class="absolute inset-0 bg-gradient-to-br from-blue-50/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

            <!-- Content -->
            <div class="relative p-6">
                <!-- Doctor Photo -->
                <div class="relative mb-6">
                    <div class="w-24 h-24 mx-auto bg-gradient-to-br from-blue-100 to-blue-200 rounded-full flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-500">
                        @if($doctor->foto || $doctor->gambar)
                            <img src="{{ asset('storage/' . ($doctor->foto ?: $doctor->gambar)) }}" alt="{{ $doctor->nama }}" class="w-full h-full rounded-full object-cover">
                        @else
                            <svg class="w-12 h-12 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                    <h3 class="text-xl font-bold text-gray-900 font-['Poppins'] mb-2">{{ $doctor->nama }}</h3>
                    <div class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-semibold mb-3">
                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                        {{ $doctor->spesialisasi }}
                    </div>
                    @if($doctor->deskripsi)
                        <p class="text-gray-600 text-sm leading-relaxed mb-4">{{ $doctor->deskripsi }}</p>
                    @else
                        <p class="text-gray-600 text-sm leading-relaxed mb-4">Dokter spesialis dengan pengalaman dan keahlian dalam bidang kesehatan.</p>
                    @endif
                </div>

                <!-- Schedule -->
                <div class="bg-slate-50 rounded-lg p-4 border border-slate-100 mb-4">
                    <div class="text-xs text-gray-600 text-center">
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
                            <div class="space-y-1">
                                @foreach($doctor->operating_hours as $day => $hours)
                                    <div class="text-xs">
                                        <span class="font-medium">{{ $days[$day] ?? 'Hari' }}:</span>
                                        <span class="ml-1">{{ $hours['start'] ?? '00:00' }} - {{ $hours['end'] ?? '00:00' }}</span>
                                    </div>
                                @endforeach
                            </div>
                        @elseif($doctor->jadwal)
                            <div class="font-medium text-gray-900 mb-1">{{ $doctor->jadwal }}</div>
                        @else
                            <div class="font-medium text-gray-900 mb-1">Senin - Jumat</div>
                            <div>08:00 - 16:00</div>
                        @endif
                    </div>
                </div>

                <!-- Contact Button -->
                @if($doctor->no_telepon)
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $doctor->no_telepon) }}" target="_blank" class="w-full inline-flex items-center justify-center px-4 py-2 bg-green-600 text-white font-medium rounded-lg hover:bg-green-700 transition-colors duration-300 text-sm">
                        <svg class="w-3 h-3 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                        </svg>
                        Konsultasi via WhatsApp
                    </a>
                @else
                    <button class="w-full inline-flex items-center justify-center px-4 py-2 bg-gray-400 text-white font-medium rounded-lg cursor-not-allowed text-sm" disabled>
                        <svg class="w-3 h-3 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                        Konsultasi
                    </button>
                @endif
            </div>
        </div>
    @endforeach
</div>
