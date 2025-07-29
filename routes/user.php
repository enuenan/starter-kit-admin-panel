<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\{
    DashboardController,
    UserSettingController
};
use App\Http\Middleware\IsAdmin;

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard.view');

    // User Settings
    Route::group(['prefix' => 'settings'], function () {
        Route::get('profile', [UserSettingController::class, 'profile'])->name('settings.profile.edit');
        Route::post('profile-settings', [UserSettingController::class, 'profileSettings'])->name('profileSettings');
        Route::put('profile', [UserSettingController::class, 'update'])->name('settings.profile.update');
        Route::delete('profile', [UserSettingController::class, 'destroy'])->name('settings.profile.destroy');

        Route::get('password', [UserSettingController::class, 'changePassword'])->name('settings.password.edit');
        Route::put('password', [UserSettingController::class, 'updatePassword'])->name('settings.password.update');

        Route::get('appearance', [UserSettingController::class, 'editAppearance'])->name('settings.appearance.edit');
    });

    Route::group(['middleware' => [IsAdmin::class]], function () {
        require __DIR__ . '/admin.php';
    });
});
