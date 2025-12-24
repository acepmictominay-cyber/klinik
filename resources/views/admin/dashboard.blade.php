@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('page-subtitle', 'Ringkasan performa dokter dan booking pasien')

@section('content')
<div class="space-y-8">
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="stat-card bg-[#f0ede5] rounded-2xl shadow-xl p-6 card-animate border border-[#004643]/20" style="animation-delay: 0.1s;">
            <div class="flex items-center">
                <div class="stat-icon w-12 h-12 bg-gradient-to-br from-[#004643]/10 to-[#003d3a]/20 rounded-lg flex items-center justify-center shadow-md">
                    <svg class="w-6 h-6 text-[#004643]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-[#004643]/70">Total Pasien</p>
                    <p class="text-2xl font-bold text-[#004643] counter" data-count="{{ $totalPatients }}">0</p>
                </div>
            </div>
        </div>

        <div class="stat-card bg-[#f0ede5] rounded-2xl shadow-xl p-6 card-animate border border-[#004643]/20" style="animation-delay: 0.2s;">
            <div class="flex items-center">
                <div class="stat-icon w-12 h-12 bg-gradient-to-br from-[#004643]/10 to-[#003d3a]/20 rounded-lg flex items-center justify-center shadow-md">
                    <svg class="w-6 h-6 text-[#004643]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-[#004643]/70">Booking Dikonfirmasi</p>
                    <p class="text-2xl font-bold text-[#004643] counter" data-count="{{ $confirmedBookings }}">0</p>
                </div>
            </div>
        </div>

        <div class="stat-card bg-[#f0ede5] rounded-2xl shadow-xl p-6 card-animate border border-[#004643]/20" style="animation-delay: 0.3s;">
            <div class="flex items-center">
                <div class="stat-icon w-12 h-12 bg-gradient-to-br from-[#004643]/10 to-[#003d3a]/20 rounded-lg flex items-center justify-center shadow-md">
                    <svg class="w-6 h-6 text-[#004643]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-[#004643]/70">Booking Pending</p>
                    <p class="text-2xl font-bold text-[#004643] counter" data-count="{{ $pendingBookings }}">0</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Doctor Performance -->
        <div class="bg-[#f0ede5] rounded-2xl shadow-xl p-8 card-animate hover:shadow-2xl transition-all duration-300 border border-[#004643]/20" style="animation-delay: 0.4s;">
            <h3 class="text-xl font-bold text-[#004643] mb-6 flex items-center">
                <svg class="w-6 h-6 mr-2 text-[#004643]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                </svg>
                Performa Dokter
            </h3>
            <div class="space-y-4">
                @foreach($doctorPerformance as $index => $performance)
                <div class="flex items-center justify-between p-4 rounded-lg hover:bg-[#f0ede5] transition-all duration-300 transform hover:translate-x-2" style="animation-delay: {{ 0.5 + ($index * 0.1) }}s;">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-gradient-to-br from-[#004643]/10 to-[#003d3a]/20 rounded-lg flex items-center justify-center mr-3 shadow-md transform hover:scale-110 transition-transform duration-300">
                            <svg class="w-5 h-5 text-[#004643]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-[#004643]">{{ $performance['name'] }}</p>
                            <p class="text-sm text-[#004643]/60">{{ $performance['specialty'] }}</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-2xl font-bold text-[#004643]">{{ $performance['patient_count'] }}</p>
                        <p class="text-sm text-[#004643]/60">pasien</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Daily Bookings Bar Chart -->
        <div class="bg-[#f0ede5] rounded-2xl shadow-xl p-8 card-animate hover:shadow-2xl transition-all duration-300 border border-[#004643]/20" style="animation-delay: 0.5s;">
            <h3 class="text-xl font-bold text-[#004643] mb-6 flex items-center">
                <svg class="w-6 h-6 mr-2 text-[#004643]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                </svg>
                Booking Harian (7 Hari Terakhir)
            </h3>
            <div class="flex justify-center">
                <canvas id="bookingChart" width="400" height="300"></canvas>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animate counters
    function animateCounter(element, target, duration = 2000) {
        let start = 0;
        const increment = target / (duration / 16);
        const timer = setInterval(() => {
            start += increment;
            if (start >= target) {
                element.textContent = target;
                clearInterval(timer);
            } else {
                element.textContent = Math.floor(start);
            }
        }, 16);
    }

    // Start counter animations
    document.querySelectorAll('.counter').forEach(counter => {
        const target = parseInt(counter.getAttribute('data-count'));
        animateCounter(counter, target);
    });

    // Chart with animation
    const ctx = document.getElementById('bookingChart').getContext('2d');
    const bookingChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($labels) !!},
            datasets: [{
                label: 'Jumlah Booking',
                data: {!! json_encode($dailyBookings) !!},
                backgroundColor: 'rgba(0, 70, 67, 0.8)',
                borderColor: '#004643',
                borderWidth: 2,
                borderRadius: 8,
                borderSkipped: false,
            }]
        },
        options: {
            responsive: true,
            animation: {
                duration: 2000,
                easing: 'easeOutQuart'
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    },
                    grid: {
                        color: 'rgba(0, 0, 0, 0.05)'
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.8)',
                    padding: 12,
                    titleFont: {
                        size: 14
                    },
                    bodyFont: {
                        size: 13
                    },
                    cornerRadius: 8
                }
            }
        }
    });
});
</script>
@endsection