<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardControlleur;
use App\Http\Controllers\AlertController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [\App\Http\Controllers\DashboardControlleur::class, 'home'])->name('dashboard');

Route::get('/informations', function () {
    return view('informations');
})->name('informations');

Route::get('/dashboard/{param}', [\App\Http\Controllers\DashboardControlleur::class, 'homeWithParam']);

Route::get('/alerts/create/{weather}', [AlertController::class, 'create'])->name('alerts.create');

Route::get('/alerts', [AlertController::class, 'index'])->name('alerts.index');

Route::post('/alerts', [AlertController::class, 'store'])->name('alerts.store');

Route::delete('/alerts/{alert}', [AlertController::class, 'delete'])->name('alerts.delete');

Route::get('/alerts/{alert}/edit', [AlertController::class, 'edit'])->name('alerts.edit');

Route::put('/alerts/{alert}', [AlertController::class, 'update'])->name('alerts.update');

