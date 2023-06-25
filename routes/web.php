<?php

use App\Http\Controllers\ActividaSocioComunitariaController;
use App\Http\Controllers\LineaInvestigacionController;
use App\Http\Controllers\ProgramaAcademicoController;
use App\Http\Controllers\ResponsableAdministrativoController;
use App\Http\Controllers\ResponsableController;
use App\Http\Controllers\StatusActividadController;
use App\Http\Controllers\TipoActividadController;
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

Route::prefix('/api')->group(function () {
    Route::apiResource('/status', StatusActividadController::class);
    Route::apiResource('/linea-investigacion', LineaInvestigacionController::class);
    Route::apiResource('/programa-academico', ProgramaAcademicoController::class);
    Route::apiResource('/responsable-administrativo', ResponsableAdministrativoController::class);
    Route::apiResource('/responsable', ResponsableController::class);
    Route::apiResource('/activida-socio-comunitaria', ActividaSocioComunitariaController::class);
    Route::apiResource('/tipo-actividades', TipoActividadController::class);
});

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/actividades/crear', [ActividaSocioComunitariaController::class, 'index'])->name('actividades.index');

    Route::get('/actividades/tipo', [TipoActividadController::class, 'index'])->name('tipo-actividades.index');

    Route::get('/actividades/programa', [ProgramaAcademicoController::class, 'index'])->name('programa.index');

    Route::get('/actividades/tipo', [TipoActividadController::class, 'index'])->name('tipo-actividades.index');

    Route::get('/actividades/administrativo', [ResponsableAdministrativoController::class, 'index'])->name('administrativo.index');

    Route::get('/actividades/academico', [ResponsableController::class, 'index'])->name('academico.index');
});
