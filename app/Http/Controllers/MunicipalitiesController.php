<?php

namespace App\Http\Controllers;

use App\Models\Municipalities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreMunicipalitiesRequest;
use App\Http\Requests\UpdateMunicipalitiesRequest;
use App\Http\Controllers\ApiController;

class MunicipalitiesController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $municipalities = Municipalities::all();
        return $this->successResponse([
            "data" => $municipalities,
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
     * @param  \App\Http\Requests\StoreMunicipalitiesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->rol_id == 1) {
            $municipalities = new Municipalities;
            $municipalities->name = $request->name;
            $municipalities->save();
        } else {
            return $this->errorResponse([
                "Mensaje" => "Usuario no permitido",
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Municipalities  $municipalities
     * @return \Illuminate\Http\Response
     */
    public function show(Municipalities $municipalities, $id)
    {
        if (Auth::user()->rol_id == 1) {
            $municipalities = Municipalities::findOrfail($id);
            return $this->showOne($municipalities);
        } else {
            return $this->errorResponse([
                "Mensaje" => "Usuario no permitido",
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Municipalities  $municipalities
     * @return \Illuminate\Http\Response
     */
    public function edit(Municipalities $municipalities)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMunicipalitiesRequest  $request
     * @param  \App\Models\Municipalities  $municipalities
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::user()->rol_id == 1) {
            $municipalities = Municipalities::findOrFail($request->id);
            $municipalities->name = $request->name;
            return $this->successResponse([
                "Mensaje" => "¡Actualizado con éxito!",
                $municipalities->save(), 200
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
     * @param  \App\Models\Municipalities  $municipalities
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if (Auth::user()->rol_id == 1) {
            $municipalities = Municipalities::destroy($request->id);
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
