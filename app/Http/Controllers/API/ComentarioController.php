<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ComentarioResource;
use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
            $query = Comentario::query();
            if ($query) {
                $query->orWhere('id', 'like', '%' . $request->q . '%');
            }

            return ComentarioResource::collection(
            Comentario::orderBy($request->_sort ?? 'id', $request->_order ?? 'asc')
            ->paginate($request->perPage));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $comentario = json_decode($request->getContent(), true);

        $comentario = Comentario::create($comentario);

        return new ComentarioResource($comentario);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comentario $comentario)
    {
         return new ComentarioResource($comentario);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comentario $comentario)
    {
        $comentarioData = json_decode($request->getContent(), true);
        $comentario->update($comentarioData);

        return new ComentarioResource($comentario);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comentario $comentario)
    {
         try {
            $comentario->delete();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error: ' . $e->getMessage()
            ], 400);
        }
    }
}
