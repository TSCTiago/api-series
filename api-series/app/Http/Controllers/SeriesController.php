<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController
{
    public function index()
    {
        return Serie::all();
    }

    public function store(Request $request)
    {

        return response()->json(Serie::create($request->all()), 201);
    }

    public function show(int $id)
    {
        $serie = Serie::find($id);
        if (is_null($serie)) {
            return  response()->json('', 404);
        }
        return  response()->json($serie);
    }

    public function update(int $id, Request $request)
    {
        $serie = Serie::find($id);
        if (is_null($serie)) {
            return response()->json([
                'erro' => 'Recurso não encontrado'

            ], 404);
        }
        $serie->fill($request->all());
        $serie->save();
    }
    public function destroy(int $id)
    {
        $qtdRecursoRemovidos = Serie::destroy($id);
        if ($qtdRecursoRemovidos === 0){
            return response()->json([
                'erro' => 'Recurso Não Encontrado'
            ], 204);
        }
        return response()->json('', 204);
    }
}
