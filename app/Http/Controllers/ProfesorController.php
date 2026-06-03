<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ProfesorController extends Controller
{
    public function index()
    {
        $profesores = Profesor::all();
        return view('profesores.index', compact('profesores'));
    }

    public function create()
    {
        return view('profesores.create');
    }

    public function store(Request $request)
    {
        Profesor::create($request->all());
        return redirect()->route('profesores.index');
    }

    public function show($id)
    {
        return redirect()->route('profesores.index');
    }

    public function edit($id)
    {
        $profesor = Profesor::findOrFail($id);
        return view('profesores.edit', compact('profesor'));
    }

    public function update(Request $request, $id)
    {
        $profesor = Profesor::findOrFail($id);
        $profesor->update($request->all());

        return redirect()->route('profesores.index');
    }

    public function destroy($id)
    {
        $profesor = Profesor::findOrFail($id);
        $profesor->delete();

        return redirect()->route('profesores.index');
    }

    public function exportarPDF()
    {
        $profesores = Profesor::all();

        $pdf = Pdf::loadView('profesores.pdf', compact('profesores'));

        return $pdf->download('reporte_profesores.pdf');
    }
}