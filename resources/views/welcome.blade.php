<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Klinik Sehat - Pusat Kesehatan Terpercaya</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            @keyframes float {
                0%, 100% { transform: translateY(0px); }
                50% { transform: translateY(-10px); }
            }
            @keyframes pulse-slow {
                0%, 100% { opacity: 1; }
                50% { opacity: 0.7; }
            }
            .animate-float {
                animation: float 6s ease-in-out infinite;
            }
            .animate-pulse-slow {
                animation: pulse-slow 4s ease-in-out infinite;
            }
        </style>
    @endif
</head>
<body class="bg-white text-gray-900 font-['Inter']">
    <!-- Header -->
    <header class="bg-blue-600 shadow-lg sticky top-0 z-50">
        <nav class="container mx-auto px-6 py-5 flex justify-between items-center">
            <div class="text-2xl font-bold text-white font-['Poppins'] tracking-wide">Klinik Sehat</div>
            <ul class="hidden md:flex space-x-10">
                <li><a href="#profile" class="text-white/90 hover:text-white transition-all duration-300 font-medium text-sm uppercase tracking-wider hover:scale-105 transform">Profile</a></li>
                <li><a href="#services" class="text-white/90 hover:text-white transition-all duration-300 font-medium text-sm uppercase tracking-wider hover:scale-105 transform">Pelayanan</a></li>
                <li><a href="#doctors" class="text-white/90 hover:text-white transition-all duration-300 font-medium text-sm uppercase tracking-wider hover:scale-105 transform">Dokter</a></li>
                <li><a href="#medicines" class="text-white/90 hover:text-white transition-all duration-300 font-medium text-sm uppercase tracking-wider hover:scale-105 transform">Obat</a></li>
                <li><a href="#boutique" class="text-white/90 hover:text-white transition-all duration-300 font-medium text-sm uppercase tracking-wider hover:scale-105 transform">Butik</a></li>
            </ul>
            <button class="md:hidden text-white p-2 hover:bg-white/10 rounded-lg transition-colors duration-300" onclick="toggleMenu()">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </nav>
        <div id="mobile-menu" class="hidden md:hidden bg-blue-700 border-t border-blue-500">
            <ul class="px-6 py-6 space-y-4">
                <li><a href="#profile" class="block text-white/90 hover:text-white transition-colors duration-300 font-medium text-sm uppercase tracking-wider py-3">Profile</a></li>
                <li><a href="#services" class="block text-white/90 hover:text-white transition-colors duration-300 font-medium text-sm uppercase tracking-wider py-3">Pelayanan</a></li>
                <li><a href="#doctors" class="block text-white/90 hover:text-white transition-colors duration-300 font-medium text-sm uppercase tracking-wider py-3">Dokter</a></li>
                <li><a href="#medicines" class="block text-white/90 hover:text-white transition-colors duration-300 font-medium text-sm uppercase tracking-wider py-3">Obat</a></li>
                <li><a href="#boutique" class="block text-white/90 hover:text-white transition-colors duration-300 font-medium text-sm uppercase tracking-wider py-3">Butik</a></li>
            </ul>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-slate-50 py-32">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-5xl md:text-7xl font-light mb-8 text-gray-900 font-['Poppins'] leading-tight">
                    Klinik
                    <span class="font-semibold text-blue-600">Sehat</span>
                </h1>
                <p class="text-xl md:text-2xl mb-12 text-gray-600 leading-relaxed max-w-2xl mx-auto font-light">
                    Pusat kesehatan modern dengan layanan medis berkualitas dan pendekatan holistik untuk kesejahteraan Anda.
                </p>
                <div class="flex flex-col sm:flex-row gap-6 justify-center">
                    <a href="#services" class="inline-flex items-center px-8 py-4 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors duration-300">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        Jelajahi Layanan
                    </a>
                    <a href="#doctors" class="inline-flex items-center px-8 py-4 border-2 border-gray-300 text-gray-700 font-medium rounded-lg hover:border-blue-600 hover:text-blue-600 transition-colors duration-300">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Tim Dokter
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Profile Klinik -->
    <section id="profile" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-3xl md:text-4xl font-light mb-12 text-gray-900 font-['Poppins'] tracking-wide text-center">Tentang Klinik Kami</h2>
                <div class="w-20 h-1 bg-blue-600 mx-auto mb-12 rounded-full"></div>
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <div>
                        <p class="text-lg text-gray-600 leading-relaxed mb-6">Klinik Sehat adalah pusat kesehatan modern yang berkomitmen untuk memberikan layanan medis berkualitas tinggi dengan pendekatan holistik. Kami memiliki tim dokter profesional dan fasilitas terkini untuk memastikan kesejahteraan pasien kami.</p>
                        <p class="text-lg text-gray-600 leading-relaxed">Dengan pengalaman bertahun-tahun, Klinik Sehat telah menjadi pilihan utama masyarakat dalam menjaga kesehatan dan mengatasi berbagai masalah kesehatan dengan solusi yang efektif dan efisien.</p>
                    </div>
                    <div class="flex justify-center">
                        <div class="bg-white rounded-[10px] shadow-lg p-4 hover:shadow-xl transition-shadow duration-300 max-w-sm">
                            <img src="/storage/assets/image.png" alt="Klinik Sehat" class="w-full h-auto rounded-[10px]">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Pelayanan -->
    <section id="services" class="py-20 bg-slate-50">
        <div class="container mx-auto px-6">
            <div class="max-w-6xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-light mb-12 text-gray-900 font-['Poppins'] tracking-wide">Layanan Kesehatan</h2>
                <div class="w-20 h-1 bg-blue-600 mx-auto mb-12 rounded-full"></div>
                <livewire:services />
            </div>
        </div>
    </section>

    <!-- Jadwal Dokter -->
    <section id="doctors" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="max-w-6xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-light mb-12 text-gray-900 font-['Poppins'] tracking-wide">Tim Dokter Profesional</h2>
                <div class="w-20 h-1 bg-blue-600 mx-auto mb-12 rounded-full"></div>
                <livewire:doctors />
            </div>
        </div>
    </section>

    <!-- Obat -->
    <section id="medicines" class="py-20 bg-slate-50">
        <div class="container mx-auto px-6">
            <div class="max-w-6xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-light mb-12 text-gray-900 font-['Poppins'] tracking-wide">Farmasi Modern</h2>
                <div class="w-20 h-1 bg-blue-600 mx-auto mb-12 rounded-full"></div>
                <livewire:medicines />
            </div>
        </div>
    </section>

    <!-- Butik -->
    <section id="boutique" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="max-w-6xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-light mb-12 text-gray-900 font-['Poppins'] tracking-wide">Butik Kesehatan</h2>
                <div class="w-20 h-1 bg-blue-600 mx-auto mb-12 rounded-full"></div>
                <livewire:boutique />
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-900 text-white py-20">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-16 mb-16">
                <div class="md:col-span-2">
                    <h3 class="text-3xl font-light font-['Poppins'] mb-6 text-white">Klinik Sehat</h3>
                    <p class="text-slate-300 text-lg leading-relaxed mb-8 max-w-md">Pusat kesehatan modern dengan layanan medis berkualitas dan pendekatan holistik untuk kesejahteraan Anda.</p>
                    <div class="flex space-x-6">
                        <a href="#" class="w-10 h-10 bg-slate-800 rounded-lg flex items-center justify-center hover:bg-blue-600 transition-colors duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-slate-800 rounded-lg flex items-center justify-center hover:bg-blue-600 transition-colors duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-slate-800 rounded-lg flex items-center justify-center hover:bg-blue-600 transition-colors duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div>
                    <h4 class="text-xl font-light font-['Poppins'] mb-8 text-white">Layanan</h4>
                    <ul class="space-y-4 text-slate-300">
                        <li><a href="#services" class="hover:text-blue-400 transition-colors duration-300 text-base">Konsultasi Umum</a></li>
                        <li><a href="#services" class="hover:text-blue-400 transition-colors duration-300 text-base">Pemeriksaan Khusus</a></li>
                        <li><a href="#services" class="hover:text-blue-400 transition-colors duration-300 text-base">Vaksinasi</a></li>
                        <li><a href="#services" class="hover:text-blue-400 transition-colors duration-300 text-base">Terapi Holistik</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-xl font-light font-['Poppins'] mb-8 text-white">Kontak</h4>
                    <ul class="space-y-4 text-slate-300">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 mr-3 mt-0.5 text-blue-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <div>
                                <p class="text-base">Jl. Kesehatan No. 123</p>
                                <p class="text-sm text-slate-400">Jakarta Selatan</p>
                            </div>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-3 text-green-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <span class="text-base">021-1234-5678</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-3 text-blue-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <span class="text-base">info@kliniksehat.com</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-3 text-yellow-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-base">24 Jam</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-slate-700 pt-12">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-slate-400 text-base">&copy; 2024 Klinik Sehat. Dibuat dengan dedikasi untuk kesehatan Anda.</p>
                    <div class="flex space-x-8 mt-6 md:mt-0">
                        <a href="{{ route('admin.doctors') }}" class="text-slate-400 hover:text-blue-400 transition-colors duration-300 text-sm font-medium">Admin Panel</a>
                        <a href="#" class="text-slate-400 hover:text-blue-400 transition-colors duration-300 text-sm font-medium">Privacy Policy</a>
                        <a href="#" class="text-slate-400 hover:text-blue-400 transition-colors duration-300 text-sm font-medium">Terms of Service</a>
                        <a href="#" class="text-slate-400 hover:text-blue-400 transition-colors duration-300 text-sm font-medium">Support</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        function toggleMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }
    </script>
</body>
</html>
