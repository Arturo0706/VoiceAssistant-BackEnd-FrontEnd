<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Controllers\ApiController;

class OrderController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::all();
        return $order;
        // return $this->successResponse([
        //     "data" => $order,
        // ]);
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
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new Order;
        $order->cantidad = $request->cantidad;
        $order->total = $request->total;
        $order->shopping_id = $request->shopping_id;
        $order->save();
        // if (Auth::user()->rol_id == 1) {
        //     $order = new Order;
        //     $order->status = $request->status;
        //     $order->subtotal = $request->subtotal;
        //     $order->save();
        // } else {
        //     return $this->errorResponse([
        //         "Mensaje" => "Usuario no permitido",
        //     ]);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order, $id)
    {
        if (Auth::user()->rol_id == 1) {
            $order = Order::findOrfail($id);
            return $this->showOne($order);
        } else {
            return $this->errorResponse([
                "Mensaje" => "Usuario no permitido",
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::user()->rol_id == 1) {
            $order = Order::findOrFail($request->id);
            $order->status = $request->status;
            $order->subtotal = $request->subtotal;
            return $this->successResponse([
                "Mensaje" => "¡Actualizado con éxito!",
                $order->save(), 200
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
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if (Auth::user()->rol_id == 1) {
            $order = Order::destroy($request->id);
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
