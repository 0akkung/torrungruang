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
            'title' => "Rope Specs > Create"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
             'spec_name' => ['required', 'min:2', 'max:255'],
             'spec_detail' => ['required', 'min:4', 'max:255'],
         ]);

        $spec = new RopeSpec();
        $spec->spec_name = $request->get('spec_name');
        $spec->spec_detail = $request->get('spec_detail');
        $spec->save();

        return redirect()->route('specs.index')->with('success', 'Rope Spec Created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(RopeSpec $spec)
    {
        return view('specs.show', [
            'title' => "Rope Specs > " . $spec->spec_name,
            'spec' => $spec
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RopeSpec $spec)
    {
        return view('specs.edit', [
            'title' => "Rope Specs > Detail > Edit",
            'spec' => $spec
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RopeSpec $spec)
    {
        $request->validate([
            'spec_name' => ['required', 'min:2', 'max:255'],
            'spec_detail' => ['required', 'min:4', 'max:255'],
        ]);

        $spec->spec_name = $request->get('spec_name');
        $spec->spec_detail = $request->get('spec_detail');
        $spec->save();

        return redirect()->route('specs.show', ['spec' => $spec]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RopeSpec $spec)
    {
        $spec->delete();

        return redirect(route('specs.index'))->with('error', 'Rope Spec deleted!');
    }

    /**
     * Search for specified resource from storage
     */
    public function search(Request $request)
    {
        $search = $request->input('search');

        $specs = RopeSpec::specName($search)->get();

        return view('specs.index', [
            'specs' => $specs,
            'title' => "Rope Specs > Search > " . $search
        ]);
    }
}
