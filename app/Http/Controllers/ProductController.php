<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Controllers\ApiController;




class ProductController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return $product;
        // return $this->successResponse([

        //     "data" => $product,
        // ]);
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
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if (Auth::user()->rol_id == 1) {
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->image = $request->image;
        $product->price = $request->price;
        $product->save();

        // // $image2 = file_get_contents($request->image2->path());
        // // $base64Image = base64_encode($image2);
        // // $url = $this->saveImages($base64Image, "products", $product->id);
        // $path = $request->file('image2')->store('images','s3');
        // $product->image()->updateOrCreate([
        //     "url" => $product,
        // ]);
        // } else {
        //     return $this->errorResponse([
        //         "Mensaje" => "Usuario no permitido",
        //     ]);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, $id)
    {
        // if (Auth::user()->rol_id == 1) {
        $product = Product::findOrfail($id);
        return $this->showOne($product);
        // } else {
        //     return $this->errorResponse([
        //         "Mensaje" => "Usuario no permitido",
        //     ]);
        // }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // if (Auth::user()->rol_id == 1) {
        $product = Product::findOrFail($request->id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->image = $request->image;
        $product->price = $request->price;
        return $this->successResponse([
            "Mensaje" => "??Actualizado con ??xito!",
            $product->save(), 200
        ]);
        // } else {
        // return $this->errorResponse([
        //     "Mensaje" => "Usuario no permitido",
        // ]);
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $product = Product::destroy($request->id);
        return $this->successResponse([
            "Mensaje" => "??Eliminado con ??xito!",
        ]);
        // if (Auth::user()->rol_id == 1) {
        //     $product = Product::destroy($request->id);
        //     return $this->successResponse([
        //         "Mensaje" => "??Eliminado con ??xito!",
        //     ]);
        // } else {
        //     return $this->errorResponse([
        //         "Mensaje" => "Usuario no permitido",
        //     ]);
        // }
    }
}
