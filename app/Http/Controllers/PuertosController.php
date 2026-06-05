<?php

namespace App\Http\Controllers;

use App\Models\Puertos;
use Illuminate\Http\Request;

class PuertosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Puertos.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Puertos $puertos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Puertos $puertos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Puertos $puertos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Puertos $puertos)
    {
        //
    }
}
