<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\TareaResource;
use App\Models\CriterioEvaluacion;
use App\Models\ResultadoAprendizaje;
use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{

    public function index(Request $request,CriterioEvaluacion $criterioId)
    {
        return TareaResource::collection(
            Tarea::where('criterio_evaluacion_id', $criterioId->id)
            ->orderBy($request->_sort ?? 'id', $request->_order ?? 'asc')
            ->paginate($request->get('perPage', 15))
        );
    }

    public function store(Request $request)
    {
        $tareaData = json_decode($request->getContent(), true);

        $tarea = Tarea::create($tareaData);

        return new TareaResource($tarea);
    }

    public function show(CriterioEvaluacion $criterioId, Tarea $id)
    {
        return new TareaResource($id);
    }

    public function update(Request $request, Tarea $tarea)
    {
        $tareaData = json_decode($request->getContent(), true);
        $tarea->update($tareaData);

        return new TareaResource($tarea);
    }

    public function destroy($id)
    {
        $tarea = Tarea::findOrFail($id);
        try {
            $tarea->delete();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error: ' . $e->getMessage()
            ], 400);
        }
    }


    public function getTareasPorResultado(Request $request,ResultadoAprendizaje $resultadoId)
    {
        $criterio = CriterioEvaluacion::where('resultado_aprendizaje_id', $resultadoId->id)->pluck('id');

        return TareaResource::collection(
            Tarea::whereIn('criterio_evaluacion_id', $criterio)
            ->orderBy($request->_sort ?? 'id', $request->_order ?? 'asc')
            ->paginate($request->get('perPage', 15))
        );
    }



}
