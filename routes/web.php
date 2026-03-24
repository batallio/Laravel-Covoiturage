<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\VehiculeController;

Route::get('/', function () {
    return view('welcome');
});

// Route::resource('employes', EmployeController::class);

Route::post('/employes/{employe}/verifier', [EmployeController::class, 'hasModele'])->name('employes.verifier');

Route::get('/employes', [EmployeController::class, 'index'])->name('employes.index');
Route::get('/employes/create', [EmployeController::class, 'create'])->name('employes.create');
Route::post('/employes', [EmployeController::class, 'store'])->name('employes.store');
Route::get('/employes/{employe}', [EmployeController::class, 'show'])->name('employes.show');
Route::get('/employes/{employe}/edit', [EmployeController::class, 'edit'])->name('employes.edit');
Route::put('/employes/{employe}', [EmployeController::class, 'update'])->name('employes.update');
Route::delete('/employes/{employe}', [EmployeController::class, 'destroy'])->name('employes.destroy');

Route::get('vehicules/spacieux', [VehiculeController::class, 'voituresSpacieuses'])->name('vehicules.spacieux');
Route::get('vehicules/recherche', [VehiculeController::class, 'rechercherParModele'])->name('vehicules.recherche');

// Route::resource('vehicules', VehiculeController::class);

Route::get('/vehicules', [VehiculeController::class, 'index'])->name('vehicules.index');
Route::get('/vehicules/create', [VehiculeController::class, 'create'])->name('vehicules.create');
Route::post('/vehicules', [VehiculeController::class, 'store'])->name('vehicules.store');
Route::get('/vehicules/{vehicule}', [VehiculeController::class, 'show'])->name('vehicules.show');
Route::get('/vehicules/{vehicule}/edit', [VehiculeController::class, 'edit'])->name('vehicules.edit');
Route::put('/vehicules/{vehicule}', [VehiculeController::class, 'update'])->name('vehicules.update');
Route::delete('/vehicules/{vehicule}', [VehiculeController::class, 'destroy'])->name('vehicules.destroy');
