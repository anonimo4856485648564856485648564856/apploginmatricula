<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use App\Models\Alumno;
use App\Models\Curso;
use App\Models\Profesor;
use App\Models\Horario;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class MatriculaController extends Controller
{
    public function index()
    {
        $matriculas = Matricula::with([
            'alumno',
            'curso',
            'profesor',
            'horario'
        ])->get();

        return view('matriculas.index', compact('matriculas'));
    }

    public function create()
    {
        $alumnos = Alumno::all();
        $cursos = Curso::all();
        $profesores = Profesor::all();
        $horarios = Horario::all();

        return view('matriculas.create', compact(
            'alumnos',
            'cursos',
            'profesores',
            'horarios'
        ));
    }

    public function store(Request $request)
    {
        Matricula::create($request->all());

        return redirect()->route('matriculas.index');
    }

    public function show($id)
    {
        return redirect()->route('matriculas.index');
    }

    public function edit($id)
    {
        $matricula = Matricula::findOrFail($id);

        $alumnos = Alumno::all();
        $cursos = Curso::all();
        $profesores = Profesor::all();
        $horarios = Horario::all();

        return view('matriculas.edit', compact(
            'matricula',
            'alumnos',
            'cursos',
            'profesores',
            'horarios'
        ));
    }

    public function update(Request $request, $id)
    {
        $matricula = Matricula::findOrFail($id);
        $matricula->update($request->all());

        return redirect()->route('matriculas.index');
    }

    public function destroy($id)
    {
        $matricula = Matricula::findOrFail($id);
        $matricula->delete();

        return redirect()->route('matriculas.index');
    }

    public function exportarPDF()
    {
        $matriculas = Matricula::with([
            'alumno',
            'curso',
            'profesor',
            'horario'
        ])->get();

        $pdf = Pdf::loadView('matriculas.pdf', compact('matriculas'));

        return $pdf->download('reporte_matriculas.pdf');
    }
}