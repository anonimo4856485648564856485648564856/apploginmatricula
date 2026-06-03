<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Models\Alumno;
use App\Models\Curso;
use App\Models\Profesor;
use App\Models\Horario;
use App\Models\Matricula;

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\MatriculaController;
use App\Http\Controllers\GoogleController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

/*
|--------------------------------------------------------------------------
| Google Login
|--------------------------------------------------------------------------
*/

Route::get('/auth/google', [GoogleController::class, 'redirect'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'callback'])->name('google.callback');

/*
|--------------------------------------------------------------------------
| Rutas protegidas
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {

        $totalAlumnos = Alumno::count();
        $totalCursos = Curso::count();
        $totalProfesores = Profesor::count();
        $totalHorarios = Horario::count();
        $totalMatriculas = Matricula::count();

        return view('dashboard', compact(
            'totalAlumnos',
            'totalCursos',
            'totalProfesores',
            'totalHorarios',
            'totalMatriculas'
        ));

    })->name('dashboard');

    Route::get('/alumnos-pdf', [AlumnoController::class, 'exportarPDF'])
        ->name('alumnos.pdf');
        
    Route::get('/cursos-pdf', [CursoController::class, 'exportarPDF'])
        ->name('cursos.pdf');

    Route::get('/profesores-pdf', [ProfesorController::class, 'exportarPDF'])
        ->name('profesores.pdf');

    Route::get('/horarios-pdf', [HorarioController::class, 'exportarPDF'])
        ->name('horarios.pdf');

    Route::get('/matriculas-pdf', [MatriculaController::class, 'exportarPDF'])
        ->name('matriculas.pdf');    

    Route::resource('alumnos', AlumnoController::class);
    Route::resource('cursos', CursoController::class);
    Route::resource('profesores', ProfesorController::class);
    Route::resource('horarios', HorarioController::class);
    Route::resource('matriculas', MatriculaController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';