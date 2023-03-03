<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SchedulesController;
use App\Http\Middleware\AdminAccess;
use App\Http\Middleware\PacienteAccess;

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

Route::get('/', [UserController::class, 'index']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);

// Administrador
Route::middleware([AdminAccess::class])->group(function () {
    Route::get('/administrativo', function () {
        return view('admin');
    });
});

// Paciente
Route::middleware([PacienteAccess::class])->group(function () {
    Route::prefix('paciente')->group(function () {
        Route::get('/', function () {
            return view('paciente');
        });
        Route::post('/agendamento', [SchedulesController::class, 'create'])->name('create_schedule');
    });
});