<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MateriaController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/materia/todas', [MateriaController::class, 'GetMaterias'])->middleware(['auth', 'verified'])->name('materia.create');
Route::get('/dashboard', [MateriaController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::resource('/materia', MateriaController::class);
Route::get('/web', [MateriaController::class, 'portal'])->name('web');
Route::get('/exibeMateria/{id}', [MateriaController::class, 'exibeMateria'])->name('exibeMateria');
Route::get('/', [MateriaController::class, 'portal']);



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
