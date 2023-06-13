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
