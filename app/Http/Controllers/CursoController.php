<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::all();
        return view('cursos.index', compact('cursos'));
    }

    public function create()
    {
        return view('cursos.create');
    }

    public function store(Request $request)
    {
        Curso::create($request->all());

        return redirect()->route('cursos.index');
    }

    public function show(Curso $curso)
    {
        return redirect()->route('cursos.index');
    }

    public function edit(Curso $curso)
    {
        return view('cursos.edit', compact('curso'));
    }

    public function update(Request $request, Curso $curso)
    {
        $curso->update($request->all());

        return redirect()->route('cursos.index');
    }

    public function destroy(Curso $curso)
    {
        $curso->delete();

        return redirect()->route('cursos.index');
    }

    public function exportarPDF()
    {
        $cursos = Curso::all();

        $pdf = Pdf::loadView('cursos.pdf', compact('cursos'));

        return $pdf->download('reporte_cursos.pdf');
    }
}