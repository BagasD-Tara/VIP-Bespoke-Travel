<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgramController;
use App\Models\Program;

/*
|--------------------------------------------------------------------------
| Web Routes - Pertemuan 9 (Program Management PresidentKu / VIP Bespoke)
|--------------------------------------------------------------------------
*/

// Route Utama: Mengarahkan langsung ke antarmuka Program Management
Route::get('/', [ProgramController::class, 'index'])->name('home');

// Resource Route untuk seluruh operasi CRUD (Task 03)
Route::resource('programs', ProgramController::class);

// Endpoint Uji Coba Query Eloquent (Task 02)
Route::get('/uji-eloquent', function () {
    // 1. Mengambil semua data
    $programs = Program::all();

    // 2. Mengambil satu data
    $program = Program::find(1);

    // 3. Menyimpan data baru (opsional fallback)
    if (!$program) {
        $program = Program::create([
            'nama' => 'Pendidikan',
            'deskripsi' => 'Program pendidikan PresidentKu'
        ]);
    }

    return response()->json([
        'task' => 'Task 02 - Build Program Model (Eloquent)',
        'status' => 'success',
        'program_find_1' => $program,
        'total_programs' => $programs->count(),
        'all_programs' => $programs
    ]);
});

// Preservasi Halaman Sebelumnya (Sesuai Prinsip: "Tidak merusak halaman sebelumnya")
Route::get('/landing', function () {
    return response()->file(base_path('latihan1.html'));
});

Route::get('/vip-portal', function () {
    return response()->file(base_path('public/landing_page.html'));
});
