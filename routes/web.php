<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServerController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CrUploadController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AccessRuleController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/servers/upload', [ServerController::class, 'upload'])->name('servers.upload');
Route::post('/servers/import', [ServerController::class, 'import'])->name('servers.import');

Route::middleware('auth')->group(function(){
    Route::resource('vendor', VendorController::class);
    Route::resource('server', ServerController::class);
    Route::resource('access-rules', AccessRuleController::class);
    Route::resource('cr-uploads', CrUploadController::class);
});



