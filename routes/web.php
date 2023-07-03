<?php

use App\Http\Controllers\Usuarios;
use App\Models\LineaInvestigacion;
use Illuminate\Support\Facades\Route;
use App\Models\ActividaSocioComunitaria;
use App\Http\Controllers\ResponsableController;
use App\Http\Controllers\TipoActividadController;
use App\Http\Controllers\StatusActividadController;
use App\Http\Controllers\ProgramaAcademicoController;
use App\Http\Controllers\LineaInvestigacionController;
use App\Http\Controllers\ActividaSocioComunitariaController;
use App\Http\Controllers\ResponsableAdministrativoController;
use App\Models\ProgramaAcademico;
use App\Models\Responsable;
use App\Models\ResponsableAdministrativo;
use App\Models\StatusActividad;
use App\Models\TipoActividad;
use App\Models\User;

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
/*
Route::prefix('/api')->group(function () {
    Route::apiResource('/status', StatusActividadController::class);
    Route::apiResource('/linea-investigacion', LineaInvestigacionController::class);
    Route::apiResource('/programa-academico', ProgramaAcademicoController::class);
    Route::apiResource('/responsable-administrativo', ResponsableAdministrativoController::class);
    Route::apiResource('/responsable', ResponsableController::class);
    Route::apiResource('/activida-socio-comunitaria', ActividaSocioComunitariaController::class);
    Route::apiResource('/tipo-actividades', TipoActividadController::class);
});*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {

        // retorna los valores que esten en la tabla linea de investigacion
        $actividades = ActividaSocioComunitaria::count();
        $tipos = TipoActividad::count();
        $programas = ProgramaAcademico::count();
        $cantidadLinea = LineaInvestigacion::count();
        $estados = StatusActividad::count();
        $administrativos = ResponsableAdministrativo::count();
        $academicos = Responsable::count();
        $usuarios = User::count();

        return view('dashboard', compact('actividades', 'tipos', 'programas', 'cantidadLinea', 'estados', 'administrativos', 'academicos', 'usuarios'));

        return view('dashboard');
    })->name('dashboard');

    Route::get('/actividades/crear', [ActividaSocioComunitariaController::class, 'index'])->name('actividades.index');
    Route::post('/actividades/crear', [ActividaSocioComunitariaController::class, 'store'])->name('actividades.store');
    Route::post('/actividades/crear/{actividad}', [ActividaSocioComunitariaController::class, 'update'])->name('actividades.update');
    Route::delete('/actividades/crear/{actividad}', [ActividaSocioComunitariaController::class, 'destroy'])->name('actividades.destroy');
    Route::get('/actividades/crear/export', [ActividaSocioComunitariaController::class, 'export'])->name('actividades.export');

    Route::get('/actividades/programa', [ProgramaAcademicoController::class, 'index'])->name('programa.index');
    Route::post('/actividades/programa', [ProgramaAcademicoController::class, 'store'])->name('programa.store');
    Route::post('/actividades/programa/{programa}', [ProgramaAcademicoController::class, 'update'])->name('programa.update');
    Route::delete('/actividades/programa/{programa}', [ProgramaAcademicoController::class, 'destroy'])->name('programa.destroy');

    Route::get('/actividades/tipo', [TipoActividadController::class, 'index'])->name('tipo-actividades.index');
    Route::post('/actividades/tipo', [TipoActividadController::class, 'store'])->name('tipo-actividades.store');
    Route::post('/actividades/tipo/{tipo}', [TipoActividadController::class, 'update'])->name('tipo-actividades.update');
    Route::delete('/actividades/tipo/{tipo}', [TipoActividadController::class, 'destroy'])->name('tipo-actividades.destroy');

    Route::get('/actividades/administrativo', [ResponsableAdministrativoController::class, 'index'])->name('administrativo.index');
    Route::post('/actividades/administrativo', [ResponsableAdministrativoController::class, 'store'])->name('administrativo.store');
    Route::post('/actividades/administrativo/{administrativo}', [ResponsableAdministrativoController::class, 'update'])->name('administrativo.update');
    Route::delete('/actividades/administrativo/{administrativo}', [ResponsableAdministrativoController::class, 'destroy'])->name('administrativo.destroy');


    Route::get('/actividades/academico', [ResponsableController::class, 'index'])->name('academico.index');
    Route::post('/actividades/academico', [ResponsableController::class, 'store'])->name('academico.store');
    Route::post('/actividades/academico/{academico}', [ResponsableController::class, 'update'])->name('academico.update');
    Route::delete('/actividades/academico/{academico}', [ResponsableController::class, 'destroy'])->name('academico.destroy');

    Route::get('/usuarios', [Usuarios::class, 'index'])->name('usuario.index');
    Route::post('/usuarios', [Usuarios::class, 'store'])->name('usuario.store');
    Route::delete('/usuarios/{usuario}', [Usuarios::class, 'destroy'])->name('usuario.destroy');

    Route::get('linea', [LineaInvestigacionController::class, 'index'])->name('linea.index');
    Route::post('linea', [LineaInvestigacionController::class, 'store'])->name('linea.store');
    Route::post('linea/{linea}', [LineaInvestigacionController::class, 'update'])->name('linea.update');
    Route::delete('linea/{linea}', [LineaInvestigacionController::class, 'destroy'])->name('linea.destroy');

    Route::resource('estatus', StatusActividadController::class);
});
