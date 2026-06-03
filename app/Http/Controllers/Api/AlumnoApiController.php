<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoApiController extends Controller
{
    public function index()
    {
        return response()->json(Alumno::all(), 200);
    }

    public function store(Request $request)
    {
        $alumno = Alumno::create($request->all());

        return response()->json([
            'message' => 'Alumno creado correctamente',
            'data' => $alumno
        ], 201);
    }

    public function show($id)
    {
        $alumno = Alumno::findOrFail($id);

        return response()->json($alumno, 200);
    }

    public function update(Request $request, $id)
    {
        $alumno = Alumno::findOrFail($id);
        $alumno->update($request->all());

        return response()->json([
            'message' => 'Alumno actualizado correctamente',
            'data' => $alumno
        ], 200);
    }

    public function destroy($id)
    {
        $alumno = Alumno::findOrFail($id);
        $alumno->delete();

        return response()->json([
            'message' => 'Alumno eliminado correctamente'
        ], 200);
    }
}