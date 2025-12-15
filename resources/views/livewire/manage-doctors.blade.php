<div>
    <div id="form-top" class="bg-white rounded-2xl shadow-xl p-8 mb-8">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">{{ $isEditing ? 'Edit Dokter' : 'Tambah Dokter Baru' }}</h2>
                <p class="text-gray-600 mt-1">{{ $isEditing ? 'Perbarui informasi dokter' : 'Masukkan informasi dokter baru' }}</p>
            </div>
            <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-full flex items-center justify-center">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
        </div>


        <form wire:submit.prevent="save" class="space-y-6">
            <div class="grid md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">Nama Lengkap</label>
                    <input type="text" wire:model="nama" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" placeholder="Masukkan nama dokter" required>
                    @error('nama') <span class="text-red-500 text-sm flex items-center mt-1"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>{{ $message }}</span> @enderror
                </div>
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">Spesialisasi</label>
                    <input type="text" wire:model="spesialisasi" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" placeholder="Contoh: Spesialis Jantung" required>
                    @error('spesialisasi') <span class="text-red-500 text-sm flex items-center mt-1"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>{{ $message }}</span> @enderror
                </div>
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">Nomor Telepon</label>
                    <input type="text" wire:model="no_telepon" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" placeholder="Contoh: 081234567890">
                    @error('no_telepon') <span class="text-red-500 text-sm flex items-center mt-1"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>{{ $message }}</span> @enderror
                </div>
                <div class="space-y-2 md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700">Hari Operasional</label>
                    @php
                        $days = [
                            1 => 'Senin',
                            2 => 'Selasa',
                            3 => 'Rabu',
                            4 => 'Kamis',
                            5 => 'Jumat',
                            6 => 'Sabtu'
                        ];
                    @endphp
                    <div class="grid grid-cols-3 gap-4">
                        @foreach($days as $key => $day)
                            <div class="p-3 bg-gray-50 rounded-lg">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <input type="checkbox" wire:model="selected_days" value="{{ $key }}" id="day-{{ $key }}" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                        <label for="day-{{ $key }}" class="ml-2 text-sm font-medium text-gray-700">{{ $day }}</label>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <input type="time" wire:model.lazy="operating_hours.{{ $key }}.start" class="rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                        <span class="text-sm text-gray-600">-</span>
                                        <input type="time" wire:model.lazy="operating_hours.{{ $key }}.end" class="rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="space-y-2 md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700">Deskripsi</label>
                    <textarea wire:model="deskripsi" rows="3" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" placeholder="Deskripsi singkat tentang dokter"></textarea>
                </div>
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">Foto Profil</label>
                    <div class="relative">
                        <input type="file" wire:model.lazy="foto" accept="image/*" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 file:mr-4 file:py-2 file:px-4 file:rounded-l-xl file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        <div class="absolute right-3 top-3 text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                            </svg>
                        </div>
                    </div>
                    @error('foto') <span class="text-red-500 text-sm flex items-center mt-1"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>{{ $message }}</span> @enderror
                </div>
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">Gambar Tambahan</label>
                    <div class="relative">
                        <input type="file" wire:model="gambar" accept="image/*" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 file:mr-4 file:py-2 file:px-4 file:rounded-l-xl file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
                        <div class="absolute right-3 top-3 text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                            </svg>
                        </div>
                    </div>
                    @error('gambar') <span class="text-red-500 text-sm flex items-center mt-1"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                <button type="submit" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold rounded-xl hover:from-blue-700 hover:to-indigo-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    {{ $isEditing ? 'Update Dokter' : 'Simpan Dokter' }}
                </button>
                @if($isEditing)
                    <button type="button" wire:click="resetForm" class="inline-flex items-center px-6 py-3 bg-gray-500 text-white font-semibold rounded-xl hover:bg-gray-600 transition-all duration-300">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Batal
                    </button>
                @endif
            </div>
        </form>
    </div>

    <!-- List -->
    <div class="bg-white rounded-2xl shadow-xl p-8">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Daftar Dokter</h2>
                <p class="text-gray-600 mt-1">Kelola semua data dokter yang terdaftar</p>
            </div>
            <div class="text-sm text-gray-500 bg-gray-100 px-3 py-1 rounded-full">
                Total: {{ $doctors->count() }} dokter
            </div>
        
            @if($showSuccessModal)
                <div class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center z-50">
                    <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm mx-4">
                        <div class="flex items-center mb-4">
                            <svg class="w-6 h-6 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <h2 class="text-lg font-semibold text-gray-900">Berhasil!</h2>
                        </div>
                        <p class="text-gray-700 mb-6">{{ $isEditing ? 'Dokter berhasil diperbarui.' : 'Dokter berhasil ditambahkan.' }}</p>
                        <div class="flex justify-end">
                            <button wire:click="closeModal" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition-colors duration-200">
                                OK
                            </button>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        
        <script>
        window.addEventListener('scroll-to-form', () => {
            document.getElementById('form-top').scrollIntoView({behavior: 'smooth'});
        });
        </script>

        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr class="border-b border-gray-200">
                        <th class="text-left py-4 px-4 font-semibold text-gray-900">Dokter</th>
                        <th class="text-left py-4 px-4 font-semibold text-gray-900">Spesialisasi</th>
                        <th class="text-left py-4 px-4 font-semibold text-gray-900">Jam Operasional</th>
                        <th class="text-left py-4 px-4 font-semibold text-gray-900">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($doctors as $doctor)
                        <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors duration-200">
                            <td class="py-4 px-4">
                                <div class="flex items-center">
                                    @if($doctor->foto || $doctor->gambar)
                                        <img src="{{ asset('storage/' . ($doctor->foto ?: $doctor->gambar)) }}" alt="{{ $doctor->nama }}" class="w-10 h-10 rounded-full object-cover mr-3">
                                    @else
                                        <div class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-500 to-indigo-500 flex items-center justify-center mr-3">
                                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                    @endif
                                    <div>
                                        <div class="font-semibold text-gray-900">{{ $doctor->nama }}</div>
                                        @if($doctor->deskripsi)
                                            <div class="text-sm text-gray-500 truncate max-w-xs">{{ Str::limit($doctor->deskripsi, 50) }}</div>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                    {{ $doctor->spesialisasi }}
                                </span>
                            </td>
                            <td class="py-4 px-4 text-gray-700">
                                @php
                                    $hours = $doctor->operating_hours ?? [];
                                    $display = '';
                                    $days = [
                                        1 => 'Senin',
                                        2 => 'Selasa',
                                        3 => 'Rabu',
                                        4 => 'Kamis',
                                        5 => 'Jumat',
                                        6 => 'Sabtu'
                                    ];
                                    foreach($hours as $day => $time) {
                                        if(isset($days[$day])) {
                                            $display .= $days[$day] . ': ' . $time['start'] . '-' . $time['end'] . ', ';
                                        }
                                    }
                                    $display = rtrim($display, ', ');
                                @endphp
                                {{ $display ?: '-' }}
                            </td>
                            <td class="py-4 px-4">
                                <div class="flex space-x-2">
                                    <button wire:click="edit({{ $doctor->id }})" class="inline-flex items-center px-3 py-2 bg-yellow-500 text-white text-sm font-medium rounded-lg hover:bg-yellow-600 transition-colors duration-200">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                        Edit
                                    </button>
                                    <button wire:click="delete({{ $doctor->id }})" class="inline-flex items-center px-3 py-2 bg-red-500 text-white text-sm font-medium rounded-lg hover:bg-red-600 transition-colors duration-200" onclick="return confirm('Apakah Anda yakin ingin menghapus dokter ini?')">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    @if($doctors->isEmpty())
                        <tr>
                            <td colspan="4" class="py-12 px-4 text-center text-gray-500">
                                <svg class="w-12 h-12 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                                Belum ada data dokter
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
