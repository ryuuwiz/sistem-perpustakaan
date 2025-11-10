<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DendaController;
use App\Http\Controllers\KategoriBukuController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('dashboard');
});

Route::get('/dashboard', function () {
    $stats = [
        'anggota' => Anggota::count(),
        'buku' => Buku::count(),
        'peminjaman' => Peminjaman::count(),
        'users' => User::count(),
    ];

    return view('dashboard', compact('stats'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('users', UserController::class);
    Route::resource('anggota', AnggotaController::class)->parameters([
        'anggota' => 'anggota',
    ]);
    Route::resource('buku', BukuController::class);
    Route::resource('kategori-buku', KategoriBukuController::class)->parameters([
        'kategori-buku' => 'kategoriBuku',
    ]);
    Route::resource('peminjaman', PeminjamanController::class);
    Route::resource('denda', DendaController::class);

    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/anggota', [ReportController::class, 'anggota'])->name('reports.anggota');
    Route::get('/reports/buku', [ReportController::class, 'buku'])->name('reports.buku');
    Route::get('/reports/peminjaman', [ReportController::class, 'peminjaman'])->name('reports.peminjaman');
});

require __DIR__ . '/auth.php';
