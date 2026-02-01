<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Matricula;
use Illuminate\Http\Request;
use App\Http\Resources\MatriculaResource;
use App\Http\Resources\UserResource;
use App\Models\ModuloFormativo;
use App\Models\User;

class MatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, ModuloFormativo $moduloFormativo)
    {
        return MatriculaResource::collection(
            Matricula::where('modulo_formativo_id', $moduloFormativo->id)
            ->orderBy($request->_sort ?? 'id', $request->_order ?? 'asc')
                ->paginate($request->perPage)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, ModuloFormativo $moduloFormativo, Matricula $matricula)
    {
        $matricula = $request->all();

        $matricula['modulo_formativo_id'] = $moduloFormativo->id;

        $matriculas = Matricula::create($matricula);

        return new MatriculaResource($matriculas);
    }

    /**
     * Display the specified resource.º
     */
    public function show(ModuloFormativo $moduloFormativo, Matricula $matricula)
    {
        return new MatriculaResource($matricula);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ModuloFormativo $moduloFormativo, Matricula $matricula)
    {
        $matriculaData = json_decode($request->getContent(), true);
        $matricula->update($matriculaData);

        return new MatriculaResource($matricula);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ModuloFormativo $moduloFormativo, Matricula $matricula)
    {
        try {
            $matricula->delete();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error: ' . $e->getMessage()
            ], 400);
        }
    }
}
