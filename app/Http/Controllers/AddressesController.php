<?php

namespace App\Http\Controllers;

use App\Models\Addresses;
use App\Http\Requests\StoreAddressesRequest;
use App\Http\Requests\UpdateAddressesRequest;

class AddressesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(StoreAddressesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Addresses  $addresses
     * @return \Illuminate\Http\Response
     */
    public function show(Addresses $addresses)
    {
        //
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
    public function update(UpdateAddressesRequest $request, Addresses $addresses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Addresses  $addresses
     * @return \Illuminate\Http\Response
     */
    public function destroy(Addresses $addresses)
    {
        //
    }
}
