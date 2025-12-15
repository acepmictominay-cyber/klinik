@extends('layouts.admin')

@section('title', 'Pengaturan Klinik')
@section('page-title', 'Pengaturan Klinik')
@section('page-subtitle', 'Kelola informasi dan pengaturan klinik')

@section('content')
    <div class="bg-white rounded-2xl shadow-xl p-8">
        @livewire('clinic-profile', ['isEdit' => true])
    </div>
@endsection