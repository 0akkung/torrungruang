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
        $specs = RopeSpec::get();
        return view('specs.index', [
            'title' => "Rope Specs",
            'specs' => $specs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('specs.create', [
            'title' => "Create Rope Specs"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request()->validate([
            'spec_name' => 'required',
            'spec_detail' => 'required',
        ]);
        
        $spec = new RopeSpec();
        $spec->spec_name = $request->get('spec_name');
        $spec->spec_detail = $request->get('spec_detail');
        $spec->save();
            return redirect()->route('specs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(RopeSpec $spec)
    {
        return view('specs.show', [
            'spec' => $spec
        ]);
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
