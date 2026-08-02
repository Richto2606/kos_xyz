<?php

use App\Http\Controllers\PublicController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\PenyewaController;
use App\Http\Controllers\TagihanController;
use Illuminate\Support\Facades\Route;

// ============= ROUTE PUBLIK =============
Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/kamar', [PublicController::class, 'kamar'])->name('public.kamar');

// ===== TAMBAHKAN ROUTE INI UNTUK DETAIL KAMAR =====
Route::get('/kamar/{id}', [PublicController::class, 'detailKamar'])->name('public.kamar.detail');
// ===== END TAMBAHAN =====

// ============= ROUTE ADMIN =============
Route::prefix('admin')->name('admin.')->group(function () {
    // Login (tanpa middleware)
    Route::get('/login', [AdminController::class, 'loginForm'])->name('login');
    Route::post('/login', [AdminController::class, 'login'])->name('login.post');
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

    // Dashboard & CRUD (dengan middleware)
    Route::middleware(['admin.auth'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // CRUD Kamar
        Route::resource('kamar', KamarController::class);
        
        // CRUD Penyewa
        Route::resource('penyewa', PenyewaController::class);
        
        // CRUD Tagihan
        Route::resource('tagihan', TagihanController::class);
        Route::post('/tagihan/generate', [TagihanController::class, 'generate'])->name('tagihan.generate');
        Route::post('/tagihan/{id}/update-status', [TagihanController::class, 'updateStatus'])->name('tagihan.updateStatus');
        
        // Notifikasi
        Route::post('/notifikasi/wa', [AdminController::class, 'kirimWA'])->name('notifikasi.wa');
        Route::post('/notifikasi/email', [AdminController::class, 'kirimEmail'])->name('notifikasi.email');
        Route::post('/notifikasi/reminder', [AdminController::class, 'kirimReminder'])->name('notifikasi.reminder');
      Route::get('/test-dashboard-simple', function () {
    try {
        $totalKamar = App\Models\Kamar::count();
        return view('admin.dashboard-test', ['totalKamar' => $totalKamar]);
    } catch (\Exception $e) {
        return 'Error: ' . $e->getMessage();
    }
})->name('test.dashboard');
    });
});

// ============= ROUTE TEST =============
Route::get('/test-simple', function () {
    return '<h1 style="color:green;">✅ Laravel berfungsi!</h1>';
});

// ============= ROUTE TEST DASHBOARD =============
Route::get('/test-dashboard-direct', function () {
    try {
        // Ambil data dari database
        $kamars = App\Models\Kamar::all();
        $totalKamar = $kamars->count();
        $tersedia = $kamars->where('status', 'Tersedia')->count();
        $terisi = $kamars->where('status', 'Penuh')->count();
        $maintenance = $kamars->where('status', 'Maintenance')->count();
        
        // Data dummy untuk test
        $data = [
            'kamars' => $kamars,
            'totalKamar' => $totalKamar,
            'tersedia' => $tersedia,
            'terisi' => $terisi,
            'maintenance' => $maintenance,
            'lunas' => 0,
            'belum' => 0,
            'tunggak' => 0,
            'pendapatanBulan' => 0,
            'pendapatanTahunan' => 0,
        ];
        
        // Tampilkan data dalam bentuk JSON dulu untuk test
        return response()->json([
            'status' => 'success',
            'data' => $data,
            'message' => 'Dashboard data berhasil diambil!'
        ]);
        
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => $e->getMessage(),
            'line' => $e->getLine(),
            'file' => $e->getFile()
        ]);
    }
});

Route::get('/test-layout', function () {
    $totalKamar = App\Models\Kamar::count();
    return view('admin.dashboard-test-layout', ['totalKamar' => $totalKamar]);
});