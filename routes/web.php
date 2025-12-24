<?php

use Illuminate\Support\Facades\Route;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Boutique;
use App\Models\Medicine;
use App\Models\Service;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    $doctors = Doctor::all();
    $boutiques = Boutique::all()->take(6);
    $medicines = Medicine::all()->take(6);
    $services = Service::all()->take(6);
    return view('welcome', compact('doctors', 'boutiques', 'medicines', 'services'));
});

Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

Route::get('/api/doctor/{id}/hours', function ($id) {
    $doctor = Doctor::findOrFail($id);
    $hours = [];
    
    if ($doctor->operating_hours && count($doctor->operating_hours) > 0) {
        $days = [
            1 => 'Senin',
            2 => 'Selasa',
            3 => 'Rabu',
            4 => 'Kamis',
            5 => 'Jumat',
            6 => 'Sabtu',
            7 => 'Minggu'
        ];
        
        foreach ($doctor->operating_hours as $day => $time) {
            $start = $time['start'] ?? '08:00';
            $end = $time['end'] ?? '17:00';
            $hours[] = [
                'label' => $days[$day] . ': ' . $start . ' - ' . $end,
                'value' => $days[$day] . ' ' . $start . '-' . $end
            ];
        }
    } else {
        $hours[] = [
            'label' => 'Senin - Jumat: 08:00 - 17:00',
            'value' => 'Senin-Jumat 08:00-17:00'
        ];
    }
    
    return response()->json($hours);
})->name('api.doctor.hours');

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Admin Routes (Protected by authentication)
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', function () {
        $totalPatients = Patient::count();
        $confirmedBookings = Patient::where('status', 'confirmed')->count();
        $pendingBookings = Patient::where('status', 'pending')->count();

        $doctorPerformance = Doctor::withCount('patients')->get()->map(function ($doctor) {
            return [
                'name' => $doctor->nama,
                'specialty' => $doctor->spesialisasi,
                'patient_count' => $doctor->patients_count
            ];
        });

        // Get daily bookings for the last 7 days
        $dailyBookings = [];
        $labels = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i)->toDateString();
            $count = Patient::whereDate('created_at', $date)->count();
            $labels[] = now()->subDays($i)->format('d/m');
            $dailyBookings[] = $count;
        }

        return view('admin.dashboard', compact('totalPatients', 'confirmedBookings', 'pendingBookings', 'doctorPerformance', 'dailyBookings', 'labels'));
    })->name('admin.dashboard');

    Route::get('/admin/doctors', function () {
        return view('admin.doctors');
    })->name('admin.doctors');

    Route::get('/admin/patients', function () {
        return view('admin.patients');
    })->name('admin.patients');

    Route::get('/admin/boutiques', function () {
        return view('admin.boutiques');
    })->name('admin.boutiques');

    Route::get('/admin/medicines', function () {
        return view('admin.medicines');
    })->name('admin.medicines');

    Route::get('/admin/services', function () {
        return view('admin.services');
    })->name('admin.services');
});

// Public pages
Route::get('/boutiques', function () {
    $search = request()->get('search', '');
    $boutiques = Boutique::query();
    
    if ($search) {
        $boutiques->where('name', 'like', '%' . $search . '%')
                   ->orWhere('description', 'like', '%' . $search . '%')
                   ->orWhere('category', 'like', '%' . $search . '%');
    }
    
    $boutiques = $boutiques->get();
    return view('boutiques', compact('boutiques', 'search'));
})->name('boutiques');

Route::get('/medicines', function () {
    $search = request()->get('search', '');
    $medicines = Medicine::query();
    
    if ($search) {
        $medicines->where('name', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
    }
    
    $medicines = $medicines->get();
    return view('medicines', compact('medicines', 'search'));
})->name('medicines');
