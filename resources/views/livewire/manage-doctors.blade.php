<div>
    <style>
        .admin-table {
            border-collapse: separate;
            border-spacing: 0;
        }
        .admin-table thead th {
            background: linear-gradient(to bottom, #f8fafc, #f1f5f9);
            border-bottom: 2px solid #e2e8f0;
            position: sticky;
            top: 0;
            z-index: 10;
        }
        .admin-table tbody tr {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            opacity: 0;
            animation: fadeInUp 0.5s ease-out forwards;
        }
        .admin-table tbody tr:nth-child(1) { animation-delay: 0.1s; }
        .admin-table tbody tr:nth-child(2) { animation-delay: 0.2s; }
        .admin-table tbody tr:nth-child(3) { animation-delay: 0.3s; }
        .admin-table tbody tr:nth-child(4) { animation-delay: 0.4s; }
        .admin-table tbody tr:nth-child(5) { animation-delay: 0.5s; }
        .admin-table tbody tr:hover {
            background-color: #f8fafc;
            transform: translateY(-2px) scale(1.01);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @keyframes fadeInScale {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
        .admin-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1), 0 1px 2px rgba(0,0,0,0.06);
            transition: all 0.3s ease;
        }
        .admin-card:hover {
            box-shadow: 0 10px 15px rgba(0,0,0,0.1), 0 4px 6px rgba(0,0,0,0.05);
        }
        .admin-btn-primary {
            background: linear-gradient(135deg, #004643 0%, #003d3a 100%);
            transition: all 0.3s ease;
        }
        .admin-btn-primary:hover {
            background: linear-gradient(135deg, #003d3a 0%, #002e2b 100%);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 70, 67, 0.3);
        }
        .admin-modal-overlay {
            backdrop-filter: blur(4px);
        }
    </style>

    <!-- Success Modal -->
    @if($showSuccessModal)
        <div class="fixed inset-0 bg-black/60 admin-modal-overlay flex items-center justify-center z-50 animate-fade-in-scale" style="animation: fadeInScale 0.3s ease-out;">
            <div class="bg-white rounded-xl shadow-2xl max-w-sm mx-4 transform transition-all scale-100 animate-scale-in">
                <div class="p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-4 animate-heartbeat">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold text-gray-900">Berhasil!</h2>
                    </div>
                    <p class="text-gray-600 mb-6 pl-16">{{ $isEditing ? 'Dokter berhasil diperbarui.' : 'Dokter berhasil ditambahkan.' }}</p>
                    <div class="flex justify-end">
                        <button type="button" wire:click="closeModal" class="admin-btn-primary text-white px-6 py-2.5 rounded-lg font-medium transform hover:scale-105 transition-transform duration-200">
                            OK
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Form Modal -->
    @if($showModal)
        <div class="fixed inset-0 bg-black/70 admin-modal-overlay flex items-center justify-center z-[9999] p-4 animate-fade-in-scale" style="animation: fadeInScale 0.3s ease-out;">
            <div class="bg-white rounded-xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-hidden flex flex-col transform scale-100 animate-scale-in">
                <!-- Modal Header -->
                <div class="bg-gradient-to-r from-[#004643] to-[#003d3a] px-6 py-4 flex items-center justify-between relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-r from-[#003d3a]/50 to-[#002e2b]/50 opacity-0 hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative z-10 flex items-center justify-between w-full">
                        <div>
                            <h2 class="text-2xl font-bold text-white">{{ $isEditing ? 'Edit Dokter' : 'Tambah Dokter Baru' }}</h2>
                            <p class="text-white/80 text-sm mt-1">{{ $isEditing ? 'Perbarui informasi dokter' : 'Masukkan informasi dokter baru' }}</p>
                        </div>
                        <button type="button" wire:click="closeModal" class="text-white/80 hover:text-white hover:bg-white/20 rounded-lg p-2 transition-all transform hover:rotate-90 duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Modal Body -->
                <div class="p-6 overflow-y-auto flex-1">
                    <form id="doctor-form" wire:submit.prevent="save" class="space-y-6">
                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Nama Lengkap <span class="text-red-500">*</span></label>
                                <input type="text" wire:model="nama" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white" placeholder="Masukkan nama dokter" required>
                                @error('nama') <span class="text-red-500 text-sm flex items-center mt-1"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>{{ $message }}</span> @enderror
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Spesialisasi <span class="text-red-500">*</span></label>
                                <input type="text" wire:model="spesialisasi" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white" placeholder="Contoh: Spesialis Jantung" required>
                                @error('spesialisasi') <span class="text-red-500 text-sm flex items-center mt-1"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>{{ $message }}</span> @enderror
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Nomor Telepon</label>
                                <input type="text" wire:model="no_telepon" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white" placeholder="Contoh: 081234567890">
                                @error('no_telepon') <span class="text-red-500 text-sm flex items-center mt-1"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>{{ $message }}</span> @enderror
                            </div>
                            <div class="space-y-2 md:col-span-2">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Hari Operasional</label>
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
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                                    @foreach($days as $key => $day)
                                        <div class="p-3 bg-gray-50 border border-gray-200 rounded-lg hover:bg-gray-100 transition-colors">
                                            <div class="flex items-center justify-between mb-2">
                                                <div class="flex items-center">
                                                    <input type="checkbox" wire:model="selected_days" value="{{ $key }}" id="day-{{ $key }}" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                                    <label for="day-{{ $key }}" class="ml-2 text-sm font-medium text-gray-700">{{ $day }}</label>
                                                </div>
                                            </div>
                                            <div class="flex items-center space-x-2 mt-2">
                                                <input type="time" wire:model="operating_hours.{{ $key }}.start" class="flex-1 px-2 py-1.5 text-sm rounded border-gray-300 focus:border-blue-500 focus:ring-blue-500 bg-white">
                                                <span class="text-sm text-gray-500">-</span>
                                                <input type="time" wire:model="operating_hours.{{ $key }}.end" class="flex-1 px-2 py-1.5 text-sm rounded border-gray-300 focus:border-blue-500 focus:ring-blue-500 bg-white">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="space-y-2 md:col-span-2">
                                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Deskripsi</label>
                                <textarea wire:model="deskripsi" rows="3" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white resize-none" placeholder="Deskripsi singkat tentang dokter"></textarea>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Foto Profil</label>
                                <div class="relative">
                                    <input type="file" wire:model.lazy="foto" wire:key="foto-input-{{ $editingId ?? 'new' }}" accept="image/*" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 file:mr-4 file:py-1.5 file:px-4 file:rounded file:border-0 file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 bg-white">
                                </div>
                                @error('foto') <span class="text-red-500 text-sm flex items-center mt-1"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>{{ $message }}</span> @enderror
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Gambar Tambahan</label>
                                <div class="relative">
                                    <input type="file" wire:model="gambar" wire:key="gambar-input-{{ $editingId ?? 'new' }}" accept="image/*" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 file:mr-4 file:py-1.5 file:px-4 file:rounded file:border-0 file:text-sm file:font-medium file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 bg-white">
                                </div>
                                @error('gambar') <span class="text-red-500 text-sm flex items-center mt-1"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Modal Footer -->
                <div class="bg-gray-50 px-6 py-4 border-t border-gray-200 flex justify-end space-x-3">
                    <button type="button" wire:click="closeModal" class="inline-flex items-center px-5 py-2.5 bg-white border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition-all duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Batal
                    </button>
                    <button type="submit" form="doctor-form" class="admin-btn-primary inline-flex items-center px-5 py-2.5 text-white font-medium rounded-lg shadow-sm">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        {{ $isEditing ? 'Update Dokter' : 'Simpan Dokter' }}
                    </button>
                </div>
            </div>
        </div>
    @endif

    <!-- Add Button -->
    <div class="mb-6 fade-in-section">
        <button type="button" wire:click="create" class="admin-btn-primary inline-flex items-center px-5 py-2.5 text-white font-medium rounded-lg shadow-sm transform hover:scale-105 transition-all duration-300 relative overflow-hidden group">
            <span class="absolute inset-0 bg-white/20 transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left duration-300"></span>
            <svg class="w-5 h-5 mr-2 relative z-10 transform group-hover:rotate-90 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            <span class="relative z-10">Tambah Dokter Baru</span>
        </button>
    </div>

    <!-- List -->
    <div class="admin-card p-6 {{ $showModal || $showSuccessModal ? 'pointer-events-none opacity-50' : '' }} transition-all duration-300">
        <div class="flex items-center justify-between mb-6 pb-4 border-b border-gray-200">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Daftar Dokter</h2>
                <p class="text-gray-600 text-sm mt-1">Kelola semua data dokter yang terdaftar</p>
            </div>
            <div class="flex items-center space-x-4">
                <div class="text-sm text-[#004643] bg-[#004643]/10 border border-[#004643]/20 px-4 py-2 rounded-lg">
                    <span class="font-semibold text-[#004643]">{{ $doctors->count() }}</span>
                    <span class="text-[#004643]/70"> dokter</span>
                </div>
            </div>
        </div>
        

        <div class="overflow-x-auto -mx-6 px-6">
            <table class="admin-table min-w-full">
                <thead>
                    <tr>
                        <th class="text-left py-3 px-4 font-semibold text-gray-700 text-sm uppercase tracking-wider">Dokter</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-700 text-sm uppercase tracking-wider">Spesialisasi</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-700 text-sm uppercase tracking-wider">Jam Operasional</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-700 text-sm uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($doctors as $doctor)
                        <tr class="border-b border-gray-100">
                            <td class="py-4 px-4">
                                <div class="flex items-center">
                                    @if($doctor->foto || $doctor->gambar)
                                        <img src="{{ asset('storage/' . ($doctor->foto ?: $doctor->gambar)) }}" alt="{{ $doctor->nama }}" class="w-12 h-12 rounded-full object-cover mr-3 border-2 border-gray-200">
                                    @else
                                        <div class="w-12 h-12 rounded-full bg-gradient-to-r from-[#004643] to-[#003d3a] flex items-center justify-center mr-3 border-2 border-gray-200">
                                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                    @endif
                                    <div>
                                        <div class="font-semibold text-gray-900">{{ $doctor->nama }}</div>
                                        @if($doctor->deskripsi)
                                            <div class="text-sm text-gray-500 truncate max-w-xs mt-0.5">{{ Str::limit($doctor->deskripsi, 50) }}</div>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <span class="inline-flex items-center px-3 py-1 rounded-md text-sm font-medium bg-[#004643]/10 text-[#004643] border border-[#004643]/20">
                                    {{ $doctor->spesialisasi }}
                                </span>
                            </td>
                            <td class="py-4 px-4">
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
                                <div class="text-sm text-gray-700">
                                    @if($display)
                                        <span class="inline-block max-w-xs truncate">{{ $display }}</span>
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <div class="flex space-x-2">
                                    <button type="button" wire:click="edit({{ $doctor->id }})" class="inline-flex items-center px-3 py-1.5 bg-amber-500 hover:bg-amber-600 text-white text-sm font-medium rounded-lg transition-all duration-300 shadow-sm hover:shadow-lg transform hover:scale-110 hover:-translate-y-1">
                                        <svg class="w-4 h-4 mr-1 transform group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                        Edit
                                    </button>
                                    <button type="button" wire:click="delete({{ $doctor->id }})" class="inline-flex items-center px-3 py-1.5 bg-red-500 hover:bg-red-600 text-white text-sm font-medium rounded-lg transition-all duration-300 shadow-sm hover:shadow-lg transform hover:scale-110 hover:-translate-y-1" onclick="return confirm('Apakah Anda yakin ingin menghapus dokter ini?')">
                                        <svg class="w-4 h-4 mr-1 transform group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                            <td colspan="4" class="py-16 px-4 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                        </svg>
                                    </div>
                                    <p class="text-gray-500 font-medium">Belum ada data dokter</p>
                                    <p class="text-gray-400 text-sm mt-1">Klik tombol "Tambah Dokter Baru" untuk menambahkan dokter pertama</p>
                                </div>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
