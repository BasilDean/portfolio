<?php

use App\Http\Controllers\gymTracker\BodyPartController;
use App\Http\Controllers\gymTracker\EquipmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'role:admin'])->prefix('gymtracker')->group(function () {
    Route::prefix('bodyparts')->group(function () {
        Route::get('/', [BodyPartController::class, 'index'])->name('gymtracker.bodyparts.index');
        Route::get('/{id}', [BodyPartController::class, 'edit'])->name('gymtracker.bodyparts.edit');
        Route::post('/', [BodyPartController::class, 'store'])->name('gymtracker.bodyparts.store');
        Route::put('/{id}', [BodyPartController::class, 'update'])->name('gymtracker.bodyparts.update');
        Route::delete('/{id}', [BodyPartController::class, 'destroy'])->name('gymtracker.bodyparts.destroy');
    });
    Route::prefix('equipment')->group(function () {
        Route::get('/', [EquipmentController::class, 'index'])->name('gymtracker.equipment.index');
        Route::get('/{id}', [EquipmentController::class, 'edit'])->name('gymtracker.equipment.edit');
        Route::post('/', [EquipmentController::class, 'store'])->name('gymtracker.equipment.store');
        Route::put('/{id}', [EquipmentController::class, 'update'])->name('gymtracker.equipment.update');
        Route::delete('/{id}', [EquipmentController::class, 'destroy'])->name('gymtracker.equipment.destroy');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('menus', MenuController::class);
});

Route::get('lang/{locale}', [LanguageController::class, 'switchLang'])->name('lang.switch');

require __DIR__.'/auth.php';
