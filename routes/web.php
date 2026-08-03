<?php

use App\Http\Controllers\PublicController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\PenyewaController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\ExportController;
use Illuminate\Support\Facades\Route;

// ============================================================
// ============= ROUTE PUBLIK =================================
// ============================================================
Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/kamar', [PublicController::class, 'kamar'])->name('public.kamar');
Route::get('/kamar/{id}', [PublicController::class, 'detailKamar'])->name('public.kamar.detail');

// ===== ROUTE BLOG / ARTIKEL =====
Route::get('/blog', [PublicController::class, 'blog'])->name('public.blog');
Route::get('/blog/{slug}', [PublicController::class, 'detailArtikel'])->name('public.artikel.detail');

// ============================================================
// ============= ROUTE ADMIN ===================================
// ============================================================
Route::prefix('admin')->name('admin.')->group(function () {
    
    // ----- LOGIN (tanpa middleware) -----
    Route::get('/login', [AdminController::class, 'loginForm'])->name('login');
    Route::post('/login', [AdminController::class, 'login'])->name('login.post');
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

    // ----- DASHBOARD & CRUD (dengan middleware) -----
    Route::middleware(['admin.auth'])->group(function () {
        
        // Dashboard
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

        // ----- EXPORT -----
        Route::get('/export/pdf', [ExportController::class, 'exportPDF'])->name('export.pdf');
        Route::get('/export/excel', [ExportController::class, 'exportExcel'])->name('export.excel');
    });
});

// ============================================================
// ============= ROUTE TEST (UNTUK DEBUG) =====================
// ============================================================
// HAPUS SEMUA ROUTE TEST INI SAAT DEPLOY KE PRODUCTION!
// Atau komentari dengan /* ... */

/*
Route::get('/test-simple', function () {
    return '<h1 style="color:green;">✅ Laravel berfungsi!</h1>';
});

Route::get('/test-dashboard-direct', function () {
    try {
        $kamars = App\Models\Kamar::all();
        $totalKamar = $kamars->count();
        $tersedia = $kamars->where('status', 'Tersedia')->count();
        $terisi = $kamars->where('status', 'Penuh')->count();
        $maintenance = $kamars->where('status', 'Maintenance')->count();
        
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

Route::get('/test-dashboard-simple', function () {
    try {
        $totalKamar = App\Models\Kamar::count();
        return view('admin.dashboard-test', ['totalKamar' => $totalKamar]);
    } catch (\Exception $e) {
        return 'Error: ' . $e->getMessage();
    }
})->name('test.dashboard');

Route::get('/test-excel', [ExportController::class, 'exportExcelTest']);
*/

// ============================================================
// ============= FALLBACK ROUTE (404) ==========================
// ============================================================
Route::fallback(function () {
    return view('errors.404');
});