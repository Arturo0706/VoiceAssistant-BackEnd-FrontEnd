<?php

namespace App\Http\Controllers;

use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreShoppingCartRequest;
use App\Http\Requests\UpdateShoppingCartRequest;
use App\Http\Controllers\ApiController;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ShoppingCartController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function shoppingCart(Request $request){

        $sql = "SELECT name,price FROM shopping_carts,products WHERE shopping_carts.product_id=products.id && user_id=$request->id";
        // $sql = "SELECT * FROM shopping_carts WHERE user_id=". $request->id;
        $detalles = DB::select($sql);

        // "rol"=> $user = Roles::find($user->rol_id),
        return $detalles;
    }


    public function index()
    {
        $shoppingCart = ShoppingCart::all();
        return $this->successResponse([
            "data" => $shoppingCart,
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
     * @param  \App\Http\Requests\StoreShoppingCartRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shoppingCart = new ShoppingCart;
        $shoppingCart->user_id = $request->user_id;
        $shoppingCart->product_id = $request->product_id;
        $shoppingCart->save();

        // if (Auth::user()->rol_id == 1) {
        //     $shoppingCart = new ShoppingCart;
        //     $shoppingCart->total = $request->total;
        //     $shoppingCart->save();
        // } else {
        //     return $this->errorResponse([
        //         "Mensaje" => "Usuario no permitido",
        //     ]);
        // }
        // $shoppingCart = new ShoppingCart;
        // $shoppingCart->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShoppingCart  $shoppingCart
     * @return \Illuminate\Http\Response
     */
    public function show(ShoppingCart $shoppingCart, $id)
    {
        if (Auth::user()->rol_id == 1) {
            $shoppingCart = ShoppingCart::findOrfail($id);
            return $this->showOne($shoppingCart);
        } else {
            return $this->errorResponse([
                "Mensaje" => "Usuario no permitido",
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShoppingCart  $shoppingCart
     * @return \Illuminate\Http\Response
     */
    public function edit(ShoppingCart $shoppingCart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateShoppingCartRequest  $request
     * @param  \App\Models\ShoppingCart  $shoppingCart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::user()->rol_id == 1) {
            $shoppingCart = ShoppingCart::findOrFail($request->id);
            $shoppingCart->total = $request->total;
            return $this->successResponse([
                "Mensaje" => "¡Actualizado con éxito!",
                $shoppingCart->save(), 200
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
     * @param  \App\Models\ShoppingCart  $shoppingCart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if (Auth::user()->rol_id == 1) {
            $shoppingCart = ShoppingCart::destroy($request->id);
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
