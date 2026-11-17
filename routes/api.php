<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgramController;

/*
|--------------------------------------------------------------------------
| API Routes - VIP Bespoke Travel & Concierge Platform
| Pertemuan 10: Task 03 - Build RESTful Program API
|--------------------------------------------------------------------------
|
| Endpoint RESTful API yang terdaftar:
| - GET    /api/programs        -> Mengambil semua data program ekspedisi
| - POST   /api/programs        -> Membuat data program baru (Validasi: nama max:100, deskripsi)
| - GET    /api/programs/{id}   -> Mengambil detail program berdasarkan ID
| - PUT    /api/programs/{id}   -> Mengubah data program ekspedisi
| - DELETE /api/programs/{id}   -> Menghapus data program ekspedisi
|
*/

Route::apiResource('programs', ProgramController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
