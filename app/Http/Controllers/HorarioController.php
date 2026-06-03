<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use App\Models\Curso;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class HorarioController extends Controller
{
    public function index()
    {
        $horarios = Horario::with('curso')->get();
        return view('horarios.index', compact('horarios'));
    }

    public function create()
    {
        $cursos = Curso::all();
        return view('horarios.create', compact('cursos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'curso_id' => 'required|exists:cursos,id',
            'dia_semana' => 'required',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'id_aula' => 'required',
        ]);

        Horario::create($request->only([
            'curso_id',
            'dia_semana',
            'hora_inicio',
            'hora_fin',
            'id_aula'
        ]));

        return redirect()->route('horarios.index');
    }

    public function show($id)
    {
        return redirect()->route('horarios.index');
    }

    public function edit($id)
    {
        $horario = Horario::findOrFail($id);
        $cursos = Curso::all();

        return view('horarios.edit', compact('horario', 'cursos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'curso_id' => 'required|exists:cursos,id',
            'dia_semana' => 'required',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'id_aula' => 'required',
        ]);

        $horario = Horario::findOrFail($id);

        $horario->update($request->only([
            'curso_id',
            'dia_semana',
            'hora_inicio',
            'hora_fin',
            'id_aula'
        ]));

        return redirect()->route('horarios.index');
    }

    public function destroy($id)
    {
        $horario = Horario::findOrFail($id);
        $horario->delete();

        return redirect()->route('horarios.index');
    }

    public function exportarPDF()
    {
        $horarios = Horario::with('curso')->get();

        $pdf = Pdf::loadView('horarios.pdf', compact('horarios'));

        return $pdf->download('reporte_horarios.pdf');
    }
}