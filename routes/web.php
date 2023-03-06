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
    Route::prefix('administrativo')->group(function () {
        Route::get('/', function () {
            $Schedules['all'] = DB::table('schedules')->where('doctor_id', Auth::user()->id)->where('status', 1)->whereDate('date_consult', '>', date('Y-m-d H:i:s', strtotime('-1 day')))->orderBy('date_consult')->get();
            $Schedules['today'] = DB::table('schedules')->where('doctor_id', Auth::user()->id)->where('status', 1)->whereDay('date_consult', Carbon::today())->get();
            $Schedules['next_days'] = DB::table('schedules')->where('doctor_id', Auth::user()->id)->where('status', 1)->whereBetween('date_consult', [Carbon::now(), Carbon::now()->addDay(7)])->get();
            return view('admin', ['schedules' => $Schedules]);
        });
        Route::put('/cancelar-agendamento', [SchedulesController::class, 'update']);
        Route::put('/marcar-notificacoes', [UserController::class, 'markAsReadNotification']);
    });
});

// Paciente
Route::middleware([PacienteAccess::class])->group(function () {
    Route::prefix('paciente')->group(function () {
        Route::get('/', function () {
            $schedules = DB::table('schedules')->where('patient_id', Auth::user()->id)->where('status', 1)->whereDate('date_consult', '>', date('Y-m-d H:i:s', strtotime('-1 day')))->orderBy('date_consult')->get();
            $doctors = DB::table('users')->where('type', 1)->get();
            return view('paciente', ['schedules' => $schedules, 'doctors' => $doctors]);
        });
        Route::post('/agendamento', [SchedulesController::class, 'create'])->name('create_schedule');
        Route::put('/cancelar-agendamento', [SchedulesController::class, 'updateByPatient']);
        Route::put('/marcar-notificacoes', [UserController::class, 'markAsReadNotification']);
    });
});