<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeudaController;

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


Route::get('/dashboard', [DeudaController::class, 'index'])->name('dashboard');
Route::resource('deudas', DeudaController::class);
Route::get('deudas/create', [DeudaController::class, 'create'])->name('deudas.create');
Route::post('deudas', [DeudaController::class, 'store'])->name('deudas.store');


Route::get('/home', function () {
    return redirect('/dashboard');
});

Route::get('/admin/settings', function () {
    return redirect()->route('profile.edit');
})->name('admin.settings');

Route::middleware('auth')->group(function () {
    // Esta es la ruta que muestra el formulario para cambiar la contraseña
    Route::get('/profile/change-password', [ProfileController::class, 'changePasswordForm'])->name('profile.change-password.form');

    // Esta ruta maneja el cambio de contraseña
    Route::patch('/profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.change-password');
});
Route::get('deudas/{id}', [DeudaController::class, 'show'])->name('deudas.show');




require __DIR__.'/auth.php';
