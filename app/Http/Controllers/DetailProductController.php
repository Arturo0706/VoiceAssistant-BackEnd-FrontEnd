<?php

namespace App\Http\Controllers;

use App\Models\DetailProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreDetailProductRequest;
use App\Http\Requests\UpdateDetailProductRequest;
use App\Http\Controllers\ApiController;

class DetailProductController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detailProduct = DetailProduct::all();
        return $this->successResponse([
            "data" => $detailProduct,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDetailProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDetailProductRequest $request)
    {
        if (Auth::user()->rol_id == 1) {
            $detailProduct = new DetailProduct;
            $detailProduct->price = $request->price;
            $detailProduct->save();
        } else {
            return $this->errorResponse([
                "Mensaje" => "Usuario no permitido",
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailProduct  $detailProduct
     * @return \Illuminate\Http\Response
     */
    public function show(DetailProduct $detailProduct, $id)
    {
        if (Auth::user()->rol_id == 1) {
            $detailProduct = DetailProduct::findOrfail($id);
            return $this->showOne($detailProduct);
        } else {
            return $this->errorResponse([
                "Mensaje" => "Usuario no permitido",
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailProduct  $detailProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailProduct $detailProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDetailProductRequest  $request
     * @param  \App\Models\DetailProduct  $detailProduct
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDetailProductRequest $request, DetailProduct $detailProduct)
    {
        if (Auth::user()->rol_id == 1) {
            $detailProduct = DetailProduct::findOfFail($request->id);
            $detailProduct->price = $request->price;
            return $this->successResponse([
                "Mensaje" => "¡Actualizado con éxito!",
                $detailProduct->save(), 200
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
     * @param  \App\Models\DetailProduct  $detailProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if (Auth::user()->rol_id == 1) {
            $detailProduct = DetailProduct::destroy($request->id);
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
