@if($isEdit)
    <div>
        <form wire:submit.prevent="save" class="space-y-6">
            <div class="grid md:grid-cols-2 gap-6">
                <div class="space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama Klinik</label>
                        <input type="text" wire:model="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>
                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700">Alamat</label>
                        <textarea wire:model="address" id="address" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                    </div>
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">Telepon</label>
                        <input type="text" wire:model="phone" id="phone" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" wire:model="email" id="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea wire:model="description" id="description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                    </div>
                </div>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Hari Operasional</label>
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
                                            <input type="checkbox" wire:model="selected_days" value="{{ $key }}" id="day-{{ $key }}" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                            <label for="day-{{ $key }}" class="ml-2 text-sm font-medium text-gray-700">{{ $day }}</label>
                                        </div>
                                        <div class="flex items-center space-x-2">
                                            <input type="time" wire:model.lazy="operating_hours.{{ $key }}.start" class="rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                            <span class="text-sm text-gray-600">-</span>
                                            <input type="time" wire:model.lazy="operating_hours.{{ $key }}.end" class="rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Simpan
                </button>
            </div>
        </form>
        @if (session()->has('message'))
            <div class="mt-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                {{ session('message') }}
            </div>
        @endif
    </div>
@else
    <div>
        @if($profile)
            <div class="grid md:grid-cols-2 gap-8 items-center">
                <div>
                    <h3 class="text-2xl font-semibold mb-4">{{ $profile->name }}</h3>
                    <p class="text-gray-600 mb-4">{{ $profile->description }}</p>
                    <p class="text-gray-600"><strong>Alamat:</strong> {{ $profile->address }}</p>
                    <p class="text-gray-600"><strong>Telepon:</strong> {{ $profile->phone }}</p>
                    <p class="text-gray-600"><strong>Email:</strong> {{ $profile->email }}</p>
                </div>
                <div class="bg-gray-200 h-64 rounded-lg flex items-center justify-center">
                    @if($profile->image)
                        <img src="{{ asset('storage/' . $profile->image) }}" alt="Klinik" class="w-full h-full object-cover rounded-lg">
                    @else
                        <span class="text-gray-500">Gambar Klinik</span>
                    @endif
                </div>
            </div>
        @else
            <div class="text-center">
                <p class="text-gray-500">Data profile klinik belum tersedia.</p>
            </div>
        @endif
    </div>
@endif
