<?php

namespace App\Http\Controllers;

use App\Models\Municipalities;
use App\Http\Requests\StoreMunicipalitiesRequest;
use App\Http\Requests\UpdateMunicipalitiesRequest;

class MunicipalitiesController extends Controller
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
     * @param  \App\Http\Requests\StoreMunicipalitiesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMunicipalitiesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Municipalities  $municipalities
     * @return \Illuminate\Http\Response
     */
    public function show(Municipalities $municipalities)
    {
        //
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
    public function update(UpdateMunicipalitiesRequest $request, Municipalities $municipalities)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Municipalities  $municipalities
     * @return \Illuminate\Http\Response
     */
    public function destroy(Municipalities $municipalities)
    {
        //
    }
}
