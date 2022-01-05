<?php

use Illuminate\Support\Facades\Route;

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
    return view('home');
});

Route::get('/home', function () {
    return view('welcome');
})->name('home');

// RUTAS PERSONAS
use App\Http\Controllers\PersonasController;
Route::prefix('/personas')->group(function () {
    Route::get('/index', [PersonasController::class, 'indexPersonas'])->name('indexPersonas');
    Route::get('/form', [PersonasController::class, 'formPersonas'])->name('formPersonas');
    Route::post('/guardar', [PersonasController::class, 'guardarPersonas'])->name('guardarPersonas');
    Route::get('/form-edit/{id}', [PersonasController::class, 'formEditPersonas'])->name('formEditPersonas');
    Route::post('/editar/{id}', [PersonasController::class, 'editarPersonas'])->name('editarPersonas');
});

// RUTAS ASISTENCIAS
use App\Http\Controllers\AsistenciaPersonasController;
Route::prefix('/asistencia-personas')->group(function () {
    Route::get('/index', [AsistenciaPersonasController::class, 'indexAsistenciaPersonas'])->name('indexAsistenciaPersonas');
    Route::get('/registro/{id}', [AsistenciaPersonasController::class, 'registroAsistenciaPersonas'])->name('registroAsistenciaPersonas');
});

// RUTAS AYUDANTES BECARIOS
use App\Http\Controllers\HorariosAyudantesBecariosController;
Route::prefix('/horarios-ayudantes-becarios')->group(function () {
    Route::get('/index', [HorariosAyudantesBecariosController::class, 'indexHorariosAyudantesBecarios'])->name('indexHorariosAyudantesBecarios');
    Route::get('/form/{id}', [HorariosAyudantesBecariosController::class, 'formHorariosAyudantesBecarios'])->name('formHorariosAyudantesBecarios');
    Route::post('/guardar/{id}', [HorariosAyudantesBecariosController::class, 'guardarHorariosAyudantesBecarios'])->name('guardarHorariosAyudantesBecarios');
});

// RUTAS REPORTES
use App\Http\Controllers\ReportesController;
Route::prefix('/reportes')->group(function () {
    Route::get('/index', [ReportesController::class, 'indexReportes'])->name('indexReportes');
    Route::post('/buscar', [ReportesController::class, 'buscarReportes'])->name('buscarReportes');
});

// RUTAS REPORTES
use App\Http\Controllers\ReportesIndividualesController;
Route::prefix('/reportes-individuales')->group(function () {
    Route::get('/index', [ReportesIndividualesController::class, 'indexReportesIndividuales'])->name('indexReportesIndividuales');
    Route::post('/buscar', [ReportesIndividualesController::class, 'buscarReportesIndividuales'])->name('buscarReportesIndividuales');
});