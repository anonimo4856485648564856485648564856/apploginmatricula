<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class AlumnoController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::all();
        return view('alumnos.index', compact('alumnos'));
    }

    public function create()
    {
        return view('alumnos.create');
    }

    public function store(Request $request)
    {
        Alumno::create($request->all());

        return redirect()->route('alumnos.index');
    }

    public function show(Alumno $alumno)
    {
        return redirect()->route('alumnos.index');
    }

    public function edit(Alumno $alumno)
    {
        return view('alumnos.edit', compact('alumno'));
    }

    public function update(Request $request, Alumno $alumno)
    {
        $alumno->update($request->all());

        return redirect()->route('alumnos.index');
    }

    public function destroy(Alumno $alumno)
    {
        $alumno->delete();

        return redirect()->route('alumnos.index');
    }

    public function exportarPDF()
    {
        $alumnos = Alumno::all();

        $pdf = Pdf::loadView('alumnos.pdf', compact('alumnos'));

        return $pdf->download('reporte_alumnos.pdf');
    }
}