<?php

namespace App\Http\Controllers;

use App\Models\Dada;
use App\Http\Requests\StoreDadaRequest;
use App\Http\Requests\UpdateDadaRequest;

class DadaController extends Controller
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
     * @param  \App\Http\Requests\StoreDadaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDadaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dada  $dada
     * @return \Illuminate\Http\Response
     */
    public function show(Dada $dada)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dada  $dada
     * @return \Illuminate\Http\Response
     */
    public function edit(Dada $dada)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDadaRequest  $request
     * @param  \App\Models\Dada  $dada
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDadaRequest $request, Dada $dada)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dada  $dada
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dada $dada)
    {
        //
    }
}
