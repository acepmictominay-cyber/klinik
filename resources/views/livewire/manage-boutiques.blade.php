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
                    <p class="text-gray-600 mb-6 pl-16">{{ $isEditing ? 'Butik berhasil diperbarui.' : 'Butik berhasil ditambahkan.' }}</p>
                    <div class="flex justify-end">
                        <button type="button" wire:click="closeModal" class="admin-btn-primary text-white px-6 py-2.5 rounded-lg font-medium transform hover:scale-105 transition-transform duration-200">
                            OK
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Delete Confirmation Modal -->
    @if($showDeleteModal)
        <div class="fixed inset-0 bg-black/70 admin-modal-overlay flex items-center justify-center z-[9999] p-4 animate-fade-in-scale" style="animation: fadeInScale 0.3s ease-out;">
            <div class="bg-white rounded-xl shadow-2xl max-w-md mx-4 transform transition-all scale-100 animate-scale-in">
                <div class="p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold text-gray-900">Konfirmasi Hapus</h2>
                    </div>
                    <p class="text-gray-600 mb-6 pl-16">Apakah Anda yakin ingin menghapus produk butik ini? Tindakan ini tidak dapat dibatalkan.</p>
                    <div class="flex justify-end space-x-3">
                        <button type="button" wire:click="closeDeleteModal" class="inline-flex items-center px-5 py-2.5 bg-white border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition-all duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Batal
                        </button>
                        <button type="button" wire:click="delete" class="inline-flex items-center px-5 py-2.5 bg-red-500 hover:bg-red-600 text-white font-medium rounded-lg shadow-sm transition-all duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                            Ya, Hapus
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
                            <h2 class="text-2xl font-bold text-white">{{ $isEditing ? 'Edit Butik' : 'Tambah Butik Baru' }}</h2>
                            <p class="text-white/80 text-sm mt-1">{{ $isEditing ? 'Perbarui informasi butik' : 'Masukkan informasi butik baru' }}</p>
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
                    <form id="boutique-form" wire:submit.prevent="save" class="space-y-6">
                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Nama Produk <span class="text-red-500">*</span></label>
                                <input type="text" wire:model="name" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white" placeholder="Masukkan nama produk" required>
                                @error('name') <span class="text-red-500 text-sm flex items-center mt-1"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>{{ $message }}</span> @enderror
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Kategori <span class="text-red-500">*</span></label>
                                <input type="text" wire:model="category" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white" placeholder="Contoh: Pakaian, Aksesoris" required>
                                @error('category') <span class="text-red-500 text-sm flex items-center mt-1"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>{{ $message }}</span> @enderror
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Harga <span class="text-red-500">*</span></label>
                                <input type="number" wire:model="price" step="0.01" min="0" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white" placeholder="Masukkan harga" required>
                                @error('price') <span class="text-red-500 text-sm flex items-center mt-1"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>{{ $message }}</span> @enderror
                            </div>
                            <div class="space-y-2 md:col-span-2">
                                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Deskripsi <span class="text-red-500">*</span></label>
                                <textarea wire:model="description" rows="3" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white resize-none" placeholder="Deskripsi produk" required></textarea>
                                @error('description') <span class="text-red-500 text-sm flex items-center mt-1"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>{{ $message }}</span> @enderror
                            </div>
                            <div class="space-y-2 md:col-span-2">
                                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Gambar Produk</label>
                                <div class="relative">
                                    <input type="file" wire:model="image" wire:key="image-input-{{ $editingId ?? 'new' }}" accept="image/*" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 file:mr-4 file:py-1.5 file:px-4 file:rounded file:border-0 file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 bg-white">
                                </div>
                                @error('image') <span class="text-red-500 text-sm flex items-center mt-1"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>{{ $message }}</span> @enderror
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
                    <button type="submit" form="boutique-form" class="admin-btn-primary inline-flex items-center px-5 py-2.5 text-white font-medium rounded-lg shadow-sm">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        {{ $isEditing ? 'Update Butik' : 'Simpan Butik' }}
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
            <span class="relative z-10">Tambah Butik Baru</span>
        </button>
    </div>

    <!-- List -->
    <div class="admin-card p-6 {{ $showModal || $showSuccessModal || $showDeleteModal ? 'pointer-events-none opacity-50' : '' }} transition-all duration-300">
        <div class="flex items-center justify-between mb-6 pb-4 border-b border-gray-200">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Daftar Butik</h2>
                <p class="text-gray-600 text-sm mt-1">Kelola semua produk butik yang terdaftar</p>
            </div>
            <div class="flex items-center space-x-4">
                <div class="text-sm text-[#004643] bg-[#004643]/10 border border-[#004643]/20 px-4 py-2 rounded-lg">
                    <span class="font-semibold text-[#004643]">{{ $boutiques->count() }}</span>
                    <span class="text-[#004643]/70"> produk</span>
                </div>
            </div>
        </div>
        

        <div class="overflow-x-auto -mx-6 px-6">
            <table class="admin-table min-w-full">
                <thead>
                    <tr>
                        <th class="text-left py-3 px-4 font-semibold text-gray-700 text-sm uppercase tracking-wider">Produk</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-700 text-sm uppercase tracking-wider">Kategori</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-700 text-sm uppercase tracking-wider">Harga</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-700 text-sm uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($boutiques as $boutique)
                        <tr class="border-b border-gray-100">
                            <td class="py-4 px-4">
                                <div class="flex items-center">
                                    @if($boutique->image)
                                        <img src="{{ asset('storage/' . $boutique->image) }}" alt="{{ $boutique->name }}" class="w-12 h-12 rounded-lg object-cover mr-3 border-2 border-gray-200">
                                    @else
                                        <div class="w-12 h-12 rounded-lg bg-gradient-to-r from-[#004643] to-[#003d3a] flex items-center justify-center mr-3 border-2 border-gray-200">
                                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                            </svg>
                                        </div>
                                    @endif
                                    <div>
                                        <div class="font-semibold text-gray-900">{{ $boutique->name }}</div>
                                        @if($boutique->description)
                                            <div class="text-sm text-gray-500 truncate max-w-xs mt-0.5">{{ Str::limit($boutique->description, 50) }}</div>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <span class="inline-flex items-center px-3 py-1 rounded-md text-sm font-medium bg-[#004643]/10 text-[#004643] border border-[#004643]/20">
                                    {{ $boutique->category }}
                                </span>
                            </td>
                            <td class="py-4 px-4">
                                <div class="text-sm font-semibold text-gray-900">
                                    Rp {{ number_format($boutique->price, 0, ',', '.') }}
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <div class="flex space-x-2">
                                    <button type="button" wire:click="edit({{ $boutique->id }})" class="inline-flex items-center px-3 py-1.5 bg-amber-500 hover:bg-amber-600 text-white text-sm font-medium rounded-lg transition-all duration-300 shadow-sm hover:shadow-lg transform hover:scale-110 hover:-translate-y-1">
                                        <svg class="w-4 h-4 mr-1 transform group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                        Edit
                                    </button>
                                    <button type="button" wire:click="confirmDelete({{ $boutique->id }})" class="inline-flex items-center px-3 py-1.5 bg-red-500 hover:bg-red-600 text-white text-sm font-medium rounded-lg transition-all duration-300 shadow-sm hover:shadow-lg transform hover:scale-110 hover:-translate-y-1">
                                        <svg class="w-4 h-4 mr-1 transform group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    @if($boutiques->isEmpty())
                        <tr>
                            <td colspan="4" class="py-16 px-4 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                        </svg>
                                    </div>
                                    <p class="text-gray-500 font-medium">Belum ada data butik</p>
                                    <p class="text-gray-400 text-sm mt-1">Klik tombol "Tambah Butik Baru" untuk menambahkan produk pertama</p>
                                </div>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

