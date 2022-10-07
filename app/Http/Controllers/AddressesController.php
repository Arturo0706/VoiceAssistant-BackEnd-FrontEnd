<?php

namespace App\Http\Controllers;

use App\Models\Addresses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreAddressesRequest;
use App\Http\Requests\UpdateAddressesRequest;
use App\Http\Controllers\ApiController;

class AddressesController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses = Addresses::all();
        return $this->successResponse([
            "data" => $addresses,
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
     * @param  \App\Http\Requests\StoreAddressesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->rol_id == 1) {
            $addresses = new Addresses;
            $addresses->suburb =$request->suburb;
            $addresses->street =$request-> street;
            $addresses->streer_numer=$request->streer_numer;
            $addresses->home_numer =$request->home_numer;
            $addresses->references =$request->references;
            $addresses->phone =$request->phone;
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
     * @param  \App\Models\Addresses  $addresses
     * @return \Illuminate\Http\Response
     */
    public function show(Addresses $addresses, $id)
    {
        if (Auth::user()->rol_id == 1) {
            $addresses = Addresses::findOrfail($id);
            return $this->showOne($addresses);
        } else {
            return $this->errorResponse([
                "Mensaje" => "Usuario no permitido",
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Addresses  $addresses
     * @return \Illuminate\Http\Response
     */
    public function edit(Addresses $addresses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAddressesRequest  $request
     * @param  \App\Models\Addresses  $addresses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::user()->rol_id == 1) {
            $addresses = Addresses::findOrFail($request->id);
            $addresses->suburb =$request->suburb;
            $addresses->street =$request-> street;
            $addresses->streer_numer=$request->streer_numer;
            $addresses->home_numer =$request->home_numer;
            $addresses->references =$request->references;
            $addresses->phone =$request->phone;
            return $this->successResponse([
                "Mensaje" => "¡Actualizado con éxito!",
                $addresses->save(), 200
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
     * @param  \App\Models\Addresses  $addresses
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if (Auth::user()->rol_id == 1) {
            $addresses = Addresses::destroy($request->id);
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
