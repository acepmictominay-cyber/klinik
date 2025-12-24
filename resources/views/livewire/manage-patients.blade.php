<div>
    <!-- Flash Messages -->
    @if (session()->has('message'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
            {{ session('message') }}
        </div>
    @endif

    <!-- List -->
    <div class="bg-white rounded-2xl shadow-xl p-8">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Daftar Pasien</h2>
                <p class="text-gray-600 mt-1">Kelola booking jadwal pasien</p>
            </div>
            <div class="flex items-center gap-3">
                @if($pendingCount > 0)
                    <div class="inline-flex items-center px-4 py-2 bg-yellow-100 border border-yellow-300 rounded-full">
                        <span class="inline-flex items-center justify-center w-6 h-6 bg-yellow-500 text-white text-xs font-bold rounded-full mr-2">
                            {{ $pendingCount }}
                        </span>
                        <span class="text-sm font-semibold text-yellow-800">Pending</span>
                    </div>
                @endif
                <div class="text-sm text-gray-500 bg-gray-100 px-3 py-1 rounded-full">
                    Total: {{ $patients->count() }} pasien
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr class="border-b border-gray-200">
                        <th class="text-left py-4 px-4 font-semibold text-gray-900">ID Pasien</th>
                        <th class="text-left py-4 px-4 font-semibold text-gray-900">Nama Pasien</th>
                        <th class="text-left py-4 px-4 font-semibold text-gray-900">Dokter</th>
                        <th class="text-left py-4 px-4 font-semibold text-gray-900">Keluhan</th>
                        <th class="text-left py-4 px-4 font-semibold text-gray-900">Status</th>
                        <th class="text-left py-4 px-4 font-semibold text-gray-900">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($patients as $patient)
                        <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors duration-200">
                            <td class="py-4 px-4 font-semibold text-gray-900">{{ $patient->id_pasien }}</td>
                            <td class="py-4 px-4">
                                <div>
                                    <div class="font-semibold text-gray-900">{{ $patient->nama_pasien }}</div>
                                    <div class="text-sm text-gray-500">{{ $patient->nomor_handphone }}</div>
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                    {{ $patient->doctor->nama ?? 'N/A' }}
                                </span>
                            </td>
                            <td class="py-4 px-4 text-gray-700 max-w-xs truncate">{{ $patient->keluhan }}</td>
                            <td class="py-4 px-4">
                                @if($patient->status == 'pending')
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                                        Pending
                                    </span>
                                @elseif($patient->status == 'confirmed')
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                        Confirmed
                                    </span>
                                @endif
                            </td>
                            <td class="py-4 px-4">
                                <div class="flex space-x-2">
                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $patient->nomor_handphone) }}?text={{ urlencode('Kami telah menerima ajuan penjadwalan dengan dokter ' . ($patient->doctor->nama ?? 'N/A') . ' di tunggu kedatangannya pada hari : ' . ($patient->doctor->jadwal ?? 'N/A')) }}" target="_blank" class="inline-flex items-center px-3 py-2 bg-green-500 text-white text-sm font-medium rounded-lg hover:bg-green-600 transition-colors duration-200">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                                        </svg>
                                        WhatsApp
                                    </a>
                                    @if($patient->status == 'pending')
                                        <button wire:click="updateStatus({{ $patient->id }}, 'confirmed')" class="inline-flex items-center px-3 py-2 bg-blue-500 text-white text-sm font-medium rounded-lg hover:bg-blue-600 transition-colors duration-200">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            Confirm
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    @if($patients->isEmpty())
                        <tr>
                            <td colspan="6" class="py-12 px-4 text-center text-gray-500">
                                <svg class="w-12 h-12 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                                Belum ada data pasien
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
