<?php

namespace App\Http\Controllers;

use App\Models\Episodio;
use Illuminate\Http\Request;

class EpisodiosController
{
    public function index()
    {
        return Episodio::all();
    }

    public function store(Request $request)
    {

        return response()->json(Episodio::create($request->all()), 201);
    }

    public function show(int $id)
    {
        $serie = Episodio::find($id);
        if (is_null($serie)) {
            return  response()->json('', 404);
        }
        return  response()->json($serie);
    }

    public function update(int $id, Request $request)
    {
        $serie = Episodio::find($id);
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
        $qtdRecursoRemovidos = Episodio::destroy($id);
        if ($qtdRecursoRemovidos === 0){
            return response()->json([
                'erro' => 'Recurso Não Encontrado'
            ], 204);
        }
        return response()->json('', 204);
    }
}
