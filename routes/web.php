<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgramController;
use App\Models\Program;

/*
|--------------------------------------------------------------------------
| Web Routes - VIP Bespoke Travel & Private Concierge (Week 9 CRUD)
|--------------------------------------------------------------------------
*/

// Route Utama: Programs Ledger (CRUD Week 9)
Route::get('/', [ProgramController::class, 'index'])->name('home');

// Resource Routes CRUD Programs (Task 03)
Route::resource('programs', ProgramController::class);

// Endpoint Uji Coba Query Eloquent JSON (Task 02)
Route::get('/uji-eloquent', function () {
    // 1. Mengambil semua data dari database
    $programs = Program::all();

    // 2. Mengambil satu data
    $program = Program::find(1);

    // 3. Menyimpan data baru (opsional fallback jika tabel kosong)
    if (!$program) {
        $program = Program::create([
            'nama' => 'Alpine Swiss Sanctuary & Winter Heli-Chalet',
            'deskripsi' => 'Ekspedisi privat chalet mewah Zermatt & St. Moritz dengan transfer helikopter pribadi.'
        ]);
        $programs = Program::all();
    }

    return response()->json([
        'platform' => 'VIP Bespoke Travel & Concierge Platform',
        'task' => 'Task 02 - Build Program Model (Eloquent ORM)',
        'database' => config('database.connections.mysql.database'),
        'status' => 'success',
        'program_find_1' => $program,
        'total_programs' => $programs->count(),
        'all_programs' => $programs
    ]);
});

// Preservasi Halaman & Fitur Sebelumnya (Prinsip: "Tidak merusak halaman sebelumnya")
Route::get('/landing', function () {
    return response()->file(base_path('latihan1.html'));
});

Route::get('/vip-portal', function () {
    return response()->file(base_path('public/landing_page.html'));
});

Route::get('/dashboard', function () {
    // Render tampilan Dashboard Sovereign Reserve (Week 7 MVC)
    require_once base_path('controllers/DashboardController.php');
    $controller = new \DashboardController();
    $controller->index();
});
