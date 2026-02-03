<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\RolResource;
use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return RolResource::collection(
            Rol::orderBy($request->sort ?? 'id', $request->order ?? 'asc')
                ->paginate($request->per_page));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rolData = json_decode($request->getContent(), true);

        $rol = Rol::create($rolData);

        return new RolResource($rol);
    }

    /**
     * Display the specified resource.
     */
    public function show(Rol $role)
    {
        return new RolResource($role);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rol $role)
    {
        $rolData = json_decode($request->getContent(), true);
        $role->update($rolData);

        return new RolResource($role);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rol $role)
    {
        try {
            $role->delete();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error: ' . $e->getMessage()
            ], 400);
        }
    }
}
