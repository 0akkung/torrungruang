<?php

namespace App\Http\Controllers;

use App\Models\RopeSpec;
use Illuminate\Http\Request;

class RopeSpecController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('specs.index', [
            'title' => "Rope Specs"
        ]);
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
    public function show(RopeSpec $ropeSpec)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RopeSpec $ropeSpec)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RopeSpec $ropeSpec)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RopeSpec $ropeSpec)
    {
        //
    }
}
