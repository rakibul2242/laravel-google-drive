<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\GoogleDriveController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});


Route::get('/google-drive/upload', [GoogleDriveController::class, 'uploadForm']);
Route::post('/google-drive/upload', [GoogleDriveController::class, 'uploadFile']);
Route::get('/google-drive/files', [GoogleDriveController::class, 'fileList']);
Route::get('/google-drive/download/{filename}', [GoogleDriveController::class, 'downloadFile']);

require __DIR__.'/auth.php';
