@extends('layouts.admin')

@section('title', 'Manajemen Obat')
@section('page-title', 'Manajemen Obat')
@section('page-subtitle', 'Kelola data obat dan produk kesehatan')

@section('content')
    <div class="bg-white rounded-2xl shadow-xl p-12 text-center">
        <div class="w-24 h-24 bg-gradient-to-r from-green-500 to-teal-500 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
            </svg>
        </div>
        <h3 class="text-2xl font-bold text-gray-900 mb-4">Fitur Manajemen Obat</h3>
        <p class="text-gray-600 mb-8 max-w-md mx-auto">Fitur ini sedang dalam pengembangan. Akan segera hadir untuk mengelola data obat dan produk kesehatan klinik.</p>
        <div class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-500 to-teal-500 text-white font-semibold rounded-lg">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Segera Hadir
        </div>
    </div>
@endsection