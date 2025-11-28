<?php

use App\Http\Controllers\CredentialController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServerController;
use App\Http\Controllers\DatabaseCredentialController;
use App\Http\Controllers\StoredFileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile routes (from Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Credentials routes
    Route::resource('credentials', CredentialController::class);
    Route::post('credentials/{credential}/copy', [CredentialController::class, 'copyValue'])->name('credentials.copy');

    // Projects routes
    Route::resource('projects', ProjectController::class);

    // Servers routes
    Route::resource('servers', ServerController::class);
    Route::post('servers/{server}/test-connection', [ServerController::class, 'testConnection'])->name('servers.test');

    // Database Credentials routes
    Route::resource('database-credentials', DatabaseCredentialController::class);
    Route::post('database-credentials/{databaseCredential}/test', [DatabaseCredentialController::class, 'testConnection'])->name('database-credentials.test');

    // Files routes
    Route::resource('files', StoredFileController::class)->except(['show']);
    Route::get('files/{file}/download', [StoredFileController::class, 'download'])->name('files.download');
});

require __DIR__ . '/auth.php';
