<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin - Klinik Mumtaz</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        @keyframes float {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
            }
            50% {
                transform: translateY(-20px) rotate(5deg);
            }
        }
        @keyframes floatReverse {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
            }
            50% {
                transform: translateY(-15px) rotate(-5deg);
            }
        }
        @keyframes pulse {
            0%, 100% {
                opacity: 0.3;
                transform: scale(1);
            }
            50% {
                opacity: 0.6;
                transform: scale(1.1);
            }
        }
        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }
        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }
        .login-container {
            animation: fadeIn 0.6s ease-out;
            position: relative;
            overflow: hidden;
        }
        .login-card {
            animation: slideIn 0.6s ease-out 0.2s both;
            position: relative;
            z-index: 10;
        }
        .input-focus:focus {
            outline: none;
            border-color: #004643;
            box-shadow: 0 0 0 3px rgba(0, 70, 67, 0.1);
        }
        .floating-medicine {
            position: absolute;
            opacity: 0.15;
            pointer-events: none;
            z-index: 1;
        }
        .medicine-1 {
            top: 10%;
            left: 5%;
            animation: float 6s ease-in-out infinite;
        }
        .medicine-2 {
            top: 20%;
            right: 8%;
            animation: floatReverse 8s ease-in-out infinite;
            animation-delay: 1s;
        }
        .medicine-3 {
            bottom: 15%;
            left: 10%;
            animation: float 7s ease-in-out infinite;
            animation-delay: 2s;
        }
        .medicine-4 {
            bottom: 25%;
            right: 5%;
            animation: floatReverse 9s ease-in-out infinite;
            animation-delay: 0.5s;
        }
        .medicine-5 {
            top: 50%;
            left: -5%;
            animation: pulse 4s ease-in-out infinite;
        }
        .medicine-6 {
            top: 60%;
            right: -3%;
            animation: pulse 5s ease-in-out infinite;
            animation-delay: 1.5s;
        }
        .logo-icon {
            animation: bounce 2s ease-in-out infinite;
        }
        .medicine-icon {
            animation: rotate 20s linear infinite;
        }
        .medicine-icon-slow {
            animation: rotate 30s linear infinite reverse;
        }
    </style>
</head>
<body class="bg-[#f0ede5] font-['Inter'] min-h-screen flex items-center justify-center p-4 relative overflow-hidden">
    <!-- Floating Medicine Icons Background -->
    <div class="floating-medicine medicine-1">
        <svg class="w-20 h-20 text-[#004643] medicine-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
        </svg>
    </div>
    <div class="floating-medicine medicine-2">
        <svg class="w-16 h-16 text-[#004643] medicine-icon-slow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
        </svg>
    </div>
    <div class="floating-medicine medicine-3">
        <svg class="w-24 h-24 text-[#004643] medicine-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
        </svg>
    </div>
    <div class="floating-medicine medicine-4">
        <svg class="w-18 h-18 text-[#004643] medicine-icon-slow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
        </svg>
    </div>
    <div class="floating-medicine medicine-5">
        <svg class="w-14 h-14 text-[#004643]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
    </div>
    <div class="floating-medicine medicine-6">
        <svg class="w-12 h-12 text-[#004643]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
        </svg>
    </div>

    <div class="login-container w-full max-w-md relative z-10">
        <div class="login-card bg-white rounded-2xl shadow-2xl p-8 border border-[#004643]/10">
            <!-- Logo/Header -->
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center mb-4 logo-icon">
                    <img 
                        src="{{ asset('storage/assets/logo/logo klinik.png') }}" 
                        alt="Logo Klinik Mumtaz" 
                        class="h-20 w-auto object-contain"
                        onerror="this.style.display='none'; this.nextElementSibling.style.display='block';"
                    >
                    <div style="display: none;" class="w-16 h-16 bg-[#004643] rounded-2xl flex items-center justify-center shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                </div>
                <h1 class="text-3xl font-bold text-[#004643] mb-2">Klinik Mumtaz</h1>
                <p class="text-[#004643]/70 text-sm">Masuk ke Dashboard Admin</p>
            </div>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div class="text-sm text-red-800">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Username Field -->
                <div class="transform transition-all duration-300 hover:scale-[1.02]">
                    <label for="username" class="block text-sm font-medium text-[#004643] mb-2">
                        Username
                    </label>
                    <div class="relative">
                        <input 
                            id="username" 
                            type="text" 
                            name="username" 
                            value="{{ old('username') }}" 
                            required 
                            autofocus
                            autocomplete="username"
                            class="input-focus block w-full px-3 py-3 border border-[#004643]/20 rounded-lg bg-[#f0ede5]/50 text-[#004643] placeholder-[#004643]/40 focus:bg-white transition-all duration-200"
                            placeholder="Masukkan username"
                        >
                    </div>
                </div>

                <!-- Password Field -->
                <div class="transform transition-all duration-300 hover:scale-[1.02]">
                    <label for="password" class="block text-sm font-medium text-[#004643] mb-2">
                        Password
                    </label>
                    <div class="relative">
                        <input 
                            id="password" 
                            type="password" 
                            name="password" 
                            required 
                            autocomplete="current-password"
                            class="input-focus block w-full px-3 py-3 border border-[#004643]/20 rounded-lg bg-[#f0ede5]/50 text-[#004643] placeholder-[#004643]/40 focus:bg-white transition-all duration-200"
                            placeholder="••••••••"
                        >
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center">
                    <input 
                        id="remember" 
                        name="remember" 
                        type="checkbox" 
                        class="h-4 w-4 text-[#004643] border-[#004643]/20 rounded focus:ring-[#004643] focus:ring-offset-0"
                    >
                    <label for="remember" class="ml-2 block text-sm text-[#004643]/70">
                        Ingat saya
                    </label>
                </div>

                <!-- Submit Button -->
                <button 
                    type="submit" 
                    class="w-full bg-[#004643] text-white py-3 px-4 rounded-lg font-semibold hover:bg-[#003d3a] focus:outline-none focus:ring-2 focus:ring-[#004643] focus:ring-offset-2 transition-all duration-200 transform hover:scale-[1.02] active:scale-[0.98] shadow-lg hover:shadow-xl relative overflow-hidden group"
                >
                    <span class="relative z-10 flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                        Masuk
                    </span>
                    <div class="absolute inset-0 bg-gradient-to-r from-[#003d3a] to-[#004643] opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </button>
            </form>

            <!-- Footer -->
            <div class="mt-6 text-center">
                <a href="/" class="text-sm text-[#004643]/70 hover:text-[#004643] transition-colors duration-200 inline-flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali ke Website
                </a>
            </div>
        </div>

        <!-- Additional Info -->
        <p class="text-center mt-6 text-sm text-[#004643]/60">
            &copy; {{ date('Y') }} Klinik Mumtaz. All rights reserved.
        </p>
    </div>
</body>
</html>

