<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\WebController;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;


// dd(Auth::user());

Route::get('/', [WebController::class, 'view'])->name('/');

Route::get('/dashboard', function () {
    return view('dashboard.view');

    // return redirect()->route('dashboard.view');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/user.php';
