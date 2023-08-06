<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\RoleController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'web'], function () {
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register', [AuthController::class, 'registerSave'])->name('register.save');
    
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'loginAction'])->name('login.action');
    
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
});

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/login');
    })->name('logout');

    Route::get('profile', [AuthController::class, 'profile'])->name('profile');

    //Menu Routes
    Route::prefix('master_menu/menu')->group(function () {
        Route::get('/', [MenuController::class, 'index'])->name('menu.index');
        Route::get('/create', [MenuController::class, 'create'])->name('menu.create');
        Route::post('/', [MenuController::class, 'store'])->name('menu.store');
        Route::get('/{id}', [MenuController::class, 'show'])->name('menu.show');
        Route::get('/{id}/edit', [MenuController::class, 'edit'])->name('menu.edit');
        Route::put('/{id}', [MenuController::class, 'update'])->name('menu.update');        
        Route::delete('/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');
        //Route::get('/export', [MenuController::class, 'export'])->name('menu.export');
    });

    
    
    //routes/web.php
// Route::prefix('master_users/role')->group(function () {
//     Route::get('/', [RoleController::class, 'index'])->name('role.index');
//     Route::get('/create', [RoleController::class, 'create'])->name('role.create');
//     Route::post('/', [RoleController::class, 'store'])->name('role.store');
//     Route::get('/{id}/edit', [RoleController::class, 'edit'])->name('role.edit');
//     Route::put('/{id}', [RoleController::class, 'update'])->name('role.update');
//     Route::delete('/{id}', [RoleController::class, 'destroy'])->name('role.destroy');
// });
// routes/web.php



Route::prefix('master_users/role')->group(function () {
    Route::get('/', [RoleController::class, 'index'])->name('role.index');
    Route::get('/create', [RoleController::class, 'create'])->name('role.create');
    Route::post('/', [RoleController::class, 'store'])->name('role.store');
    Route::get('/{id}/edit', [RoleController::class, 'edit'])->name('role.edit');
    Route::put('/{id}', [RoleController::class, 'update'])->name('role.update');
    Route::delete('/{id}', [RoleController::class, 'destroy'])->name('role.destroy');
});


    
    
    // Rute untuk User
    Route::prefix('master_users/user')->group(function () {
        Route::get('/', [DataUserController::class, 'index'])->name('user.index');
        Route::get('/create', [DataUserController::class, 'create'])->name('user.create');
        Route::post('/', [DataUserController::class, 'store'])->name('user.store');
        Route::get('/{id}', [DataUserController::class, 'show'])->name('user.show');
        Route::get('/{id}/edit', [DataUserController::class, 'edit'])->name('user.edit');
        Route::put('/{id}', [DataUserController::class, 'update'])->name('user.update');
        Route::delete('/{id}', [DataUserController::class, 'destroy'])->name('user.destroy');
    });
});
    