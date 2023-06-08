<?php  

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ModuleController;
use App\Http\Controllers\Admin\PabrikController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PermissionController;

Route::name('superadmin.')->middleware(['auth', 'role:admin'])->prefix('superadmin')->group(function () {

    // Route::get('/dashboard', [DashboardController::class, '__invoke'])->name('dashboard');

    // Route::get('/profile', ['App\Http\Controllers\Admin\ProfileController', '__invoke'])->name('profile');

    // management user role permission
    Route::prefix('manageuser')->group(function(){

        Route::post('/managePermission', [UserController::class, 'managePermission'])->name('user.managePermission');

        Route::post('/manageRole', [UserController::class, 'manageRole'])->name('user.manageRole');
       
        Route::Resource('user', UserController::class);

        Route::Resource('role', RoleController::class, ['except' => 'show']);

    });

    Route::prefix('master')->group(function (){

        Route::Resource('permission', PermissionController::class, ['except' => 'show']);

        // Route::Resource('landingpage', ModuleController::class, ['except' => 'show']);

        // Route::Resource('pabrik', PabrikController::class, ['except' => 'show']);

        // Route::post('getpermission', [ModuleController::class , 'getPermission'])->name('getpermission');

    });
});
