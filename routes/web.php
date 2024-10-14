<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// RECUPERO DASHBOARD
use App\Http\Controllers\Admin\DashboardController;

// RECUPERO PROJECT
use App\Http\Controllers\Admin\ProjectController;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// QUESTE SONO LE ROTTE DI AMMINISTRAZIONE DEL SITO
Route::middleware(['auth', 'verified'])->name('admin.')->prefix('admin')->group(function() {
    // La middleware è un metodo che deve contenere 'auth' e 'verified' per controllare che l'accesso sia consentito solo agli utenti loggati e verificati. 
    // Il nome con cui iniziano le rotte
    // Il nome con cui iniziano tutti gli url

    // DASHBOARD ROUTE NAMED DASHBOARD
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // PROJECT
    Route::resource('/projects', ProjectController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
