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

Route::post('/materia', [MateriaController::class, 'store'])->middleware(['auth', 'verified'])->name('materia.store');
Route::get('/materia', [MateriaController::class, 'index'])->middleware(['auth', 'verified'])->name('materia.index');
Route::get('/materia/cadastro', [MateriaController::class, 'create'])->middleware(['auth', 'verified'])->name('materia.create');
Route::get('/materia/todas', [MateriaController::class, 'GetMaterias'])->middleware(['auth', 'verified'])->name('materia.create');

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});



Route::get('/dashboard', [MateriaController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
