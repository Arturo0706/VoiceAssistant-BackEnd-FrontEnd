<?php

namespace App\Http\Controllers;

use App\Models\States;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreStatesRequest;
use App\Http\Requests\UpdateStatesRequest;
use App\Http\Controllers\ApiController;



class StatesController extends ApiController

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = States::all();
        return $this->successResponse([
            "data" => $states,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStatesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->rol_id == 1) {
            $states = new States;
            $states->name = $request->name;
            $states->save();
            return $this->successResponse([
                "Mensaje" => "¡Creado exitosamente!",
            ]);
        } else {
            return $this->errorResponse([
                "Mensaje" => "Usuario no permitido",
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\States  $states
     * @return \Illuminate\Http\Response
     */
    public function show(States $states, $id)
    {
        if (Auth::user()->rol_id == 1) {
            $states = States::findOrfail($id);
            return $this->showOne($states);
        } else {
            return $this->errorResponse([
                "Mensaje" => "Usuario no permitido",
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\States  $states
     * @return \Illuminate\Http\Response
     */
    public function edit(States $states)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStatesRequest  $request
     * @param  \App\Models\States  $states
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::user()->rol_id == 1) {
            $states = States::findOrFail($request->id);
            $states->name = $request->name;
            return $this->successResponse([
                "Mensaje" => "¡Actualizado con éxito!",
                $states->save(), 200
            ]);
        } else {
            return $this->errorResponse([
                "Mensaje" => "Usuario no permitido",
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\States  $states
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if (Auth::user()->rol_id == 1) {
            $states = States::destroy($request->id);
            return $this->successResponse([
                "Mensaje" => "¡Eliminado con éxito!",
            ]);
        } else {
            return $this->errorResponse([
                "Mensaje" => "Usuario no permitido",
            ]);
        }
    }
}
