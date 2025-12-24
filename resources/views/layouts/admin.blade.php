<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard Admin') - Klinik Mumtaz</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    @livewireStyles
    <style>
        /* Smooth fade and slide animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @keyframes fadeInScale {
            from {
                opacity: 0;
                transform: scale(0.96);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        @keyframes pageTransition {
            from {
                opacity: 0;
                transform: translateY(15px) scale(0.98);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }
        @keyframes pulse-glow {
            0%, 100% {
                box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.4);
            }
            50% {
                box-shadow: 0 0 0 8px rgba(59, 130, 246, 0);
            }
        }
        .sidebar-animate {
            /* No animation for sidebar */
        }
        .content-animate {
            animation: fadeInScale 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .page-content {
            animation: pageTransition 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            transition: opacity 0.3s cubic-bezier(0.4, 0, 0.2, 1), transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .page-content.fade-out {
            opacity: 0;
            transform: translateY(-10px) scale(0.98);
        }
        .page-content.fade-in {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
        .card-animate {
            animation: fadeInUp 0.5s cubic-bezier(0.4, 0, 0.2, 1) forwards;
        }
        .nav-item {
            position: relative;
            overflow: hidden;
        }
        .nav-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 4px;
            background: white;
            transform: scaleY(0);
            transition: transform 0.3s ease;
        }
        .nav-item.active::before,
        .nav-item:hover::before {
            transform: scaleY(1);
        }
        .nav-item::after {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            width: 0;
            height: 2px;
            background: rgba(255, 255, 255, 0.3);
            transition: width 0.3s ease;
        }
        .nav-item:hover::after {
            width: 100%;
        }
        .stat-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .stat-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        .stat-icon {
            transition: all 0.3s ease;
        }
        .stat-card:hover .stat-icon {
            transform: rotate(10deg) scale(1.1);
        }
        .loading-skeleton {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
        }
        @keyframes loading {
            0% {
                background-position: 200% 0;
            }
            100% {
                background-position: -200% 0;
            }
        }
    </style>
</head>
<body class="bg-[#f0ede5] font-['Inter']">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-[#004643] text-white shadow-xl sidebar-animate">
            <div class="p-6">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold">Klinik Mumtaz</h1>
                        <p class="text-white/70 text-sm">Dashboard Admin</p>
                    </div>
                </div>
            </div>

            <nav class="mt-6">
                <div class="px-6">
                    <p class="text-white/70 text-xs font-semibold uppercase tracking-wider mb-2">Menu Utama</p>
                </div>
                @php
                    $pendingPatientsCount = \App\Models\Patient::where('status', 'pending')->count();
                @endphp
                <a href="{{ route('admin.dashboard') }}" class="nav-item flex items-center px-6 py-3 {{ request()->routeIs('admin.dashboard') ? 'bg-white/10 border-r-4 border-white active' : 'hover:bg-white/5' }} transition-all duration-300 transform hover:translate-x-2">
                    <svg class="w-5 h-5 mr-3 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                    <span class="font-medium relative z-10">Dashboard</span>
                </a>
                <a href="{{ route('admin.doctors') }}" class="nav-item flex items-center px-6 py-3 {{ request()->routeIs('admin.doctors') ? 'bg-white/10 border-r-4 border-white active' : 'hover:bg-white/5' }} transition-all duration-300 transform hover:translate-x-2">
                    <svg class="w-5 h-5 mr-3 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <span class="font-medium relative z-10">Dokter</span>
                </a>
                <a href="{{ route('admin.patients') }}" class="nav-item flex items-center px-6 py-3 {{ request()->routeIs('admin.patients') ? 'bg-white/10 border-r-4 border-white active' : 'hover:bg-white/5' }} transition-all duration-300 transform hover:translate-x-2">
                    <svg class="w-5 h-5 mr-3 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    <span class="font-medium relative z-10">Pasien</span>
                    @if($pendingPatientsCount > 0)
                        <span class="ml-auto bg-yellow-500 text-white text-xs font-bold px-2 py-1 rounded-full min-w-[20px] text-center">
                            {{ $pendingPatientsCount }}
                        </span>
                    @endif
                </a>
                <a href="{{ route('admin.boutiques') }}" class="nav-item flex items-center px-6 py-3 {{ request()->routeIs('admin.boutiques') ? 'bg-white/10 border-r-4 border-white active' : 'hover:bg-white/5' }} transition-all duration-300 transform hover:translate-x-2">
                    <svg class="w-5 h-5 mr-3 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                    <span class="font-medium relative z-10">Butik</span>
                </a>
                <a href="{{ route('admin.medicines') }}" class="nav-item flex items-center px-6 py-3 {{ request()->routeIs('admin.medicines') ? 'bg-white/10 border-r-4 border-white active' : 'hover:bg-white/5' }} transition-all duration-300 transform hover:translate-x-2">
                    <svg class="w-5 h-5 mr-3 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                    </svg>
                    <span class="font-medium relative z-10">Obat</span>
                </a>
                <a href="{{ route('admin.services') }}" class="nav-item flex items-center px-6 py-3 {{ request()->routeIs('admin.services') ? 'bg-white/10 border-r-4 border-white active' : 'hover:bg-white/5' }} transition-all duration-300 transform hover:translate-x-2">
                    <svg class="w-5 h-5 mr-3 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    <span class="font-medium relative z-10">Layanan</span>
                </a>
            </nav>

            <div class="absolute bottom-0 left-0 right-0 p-6">
                <a href="/" class="flex items-center px-4 py-2 bg-white/10 rounded-lg hover:bg-white/20 transition-all duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    <span class="text-sm">Kembali ke Website</span>
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden content-animate">
            <!-- Header -->
            <header class="bg-[#f0ede5] shadow-sm border-b border-[#004643]/20 sticky top-0 z-40">
                <div class="px-6 py-4 flex justify-between items-center">
                    <div>
                        <h2 class="text-2xl font-bold text-[#004643]">@yield('page-title', 'Dashboard')</h2>
                        <p class="text-[#004643]/70 text-sm">@yield('page-subtitle', 'Kelola data klinik Anda')</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="text-right">
                            <p class="text-sm font-medium text-[#004643]">{{ Auth::user()->name ?? 'Admin' }}</p>
                            <p class="text-xs text-[#004643]/60">{{ Auth::user()->email ?? 'Administrator Klinik' }}</p>
                        </div>
                        <div class="w-10 h-10 bg-[#004643] rounded-full flex items-center justify-center transform hover:scale-110 transition-transform duration-300 cursor-pointer shadow-lg hover:shadow-xl">
                            <svg class="w-5 h-5 text-[#f0ede5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <form method="POST" action="{{ route('logout') }}" class="ml-2">
                            @csrf
                            <button type="submit" class="flex items-center px-4 py-2 bg-[#004643] text-white rounded-lg hover:bg-[#003d3a] focus:outline-none focus:ring-2 focus:ring-[#004643] focus:ring-offset-2 transition-all duration-200 transform hover:scale-105 active:scale-95 shadow-md hover:shadow-lg">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                                <span class="text-sm font-medium">Logout</span>
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <!-- Content -->
            <main class="flex-1 overflow-y-auto bg-[#f0ede5] p-6 page-content">
                @yield('content')
            </main>
        </div>
    </div>
    @livewireScripts
    <script>
        // Smooth page transitions
        document.addEventListener('DOMContentLoaded', function() {
            const mainContent = document.querySelector('.page-content');
            
            // Animate content on page load
            if (mainContent) {
                mainContent.classList.add('fade-in');
            }

            // Handle navigation clicks for smooth transitions
            const navLinks = document.querySelectorAll('.nav-item');
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    const href = this.getAttribute('href');
                    if (href && !this.classList.contains('active')) {
                        e.preventDefault();
                        
                        if (mainContent) {
                            mainContent.classList.remove('fade-in');
                            mainContent.classList.add('fade-out');
                            
                            setTimeout(() => {
                                window.location.href = href;
                            }, 250);
                        } else {
                            window.location.href = href;
                        }
                    }
                });
            });

            // Initialize fade-in sections for admin
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.fade-in-section').forEach(section => {
                observer.observe(section);
            });
        });

        // Smooth transition on page unload
        let isNavigating = false;
        window.addEventListener('beforeunload', function() {
            if (!isNavigating) {
                const mainContent = document.querySelector('.page-content');
                if (mainContent) {
                    mainContent.classList.remove('fade-in');
                    mainContent.classList.add('fade-out');
                }
            }
        });
    </script>
</body>
</html>