<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TandartsController;
use App\Http\Controllers\MondhygienistController;
use App\Http\Controllers\AssistentController;
use App\Http\Controllers\PraktijkmanagementController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/tandarts', [TandartsController::class, 'index'])
    ->middleware(['auth', 'role:tandarts'])
    ->name('tandarts.index');

Route::get('/mondhygienist', [MondhygienistController::class, 'index'])
    ->middleware(['auth', 'role:mondhygienist'])
    ->name('mondhygienist.index');

Route::get('/assistent', [AssistentController::class, 'index'])
    ->middleware(['auth', 'role:assistent'])
    ->name('assistent.index');

Route::get('/praktijkmanagement', [PraktijkmanagementController::class, 'index'])
    ->middleware(['auth', 'role:praktijkmanagement'])
    ->name('praktijkmanagement.index');

Route::get('/patient', [PatientController::class, 'index'])
    ->middleware(['auth', 'role:patient,praktijkmanagement'])
    ->name('patient.index');

    use Illuminate\Support\Facades\Auth;

Route::get('/uitloggen', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/login');
});

require __DIR__.'/auth.php';