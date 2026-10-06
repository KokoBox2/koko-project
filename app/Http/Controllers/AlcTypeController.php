<?php

namespace App\Http\Controllers;

use App\Models\AlcType;
use Illuminate\Http\Request;

class AlcTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alcTypes = AlcType::get();

        return view('alcTypes.index', compact('alcTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alcTypes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            'name' => 'required|string|max:255',
        ]);

        $alcType = AlcType::create($validated);
        return redirect()
        ->route('alcTypes.index',compact('alcType'))
        ->with('success');
    }

    /**
     * Display the specified resource.
     */
    public function show(AlcType $alcType)
    {
        return view('alcTypes.show', compact('alcType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AlcType $alcType)
    {
        return view('alcTypes.edit', compact('alcType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AlcType $alcType)
    {
        $validated=$request->validate([
            'name' => 'required|string|max:255',
        ]);

        $alcType->update($validated);
        return redirect()
        ->route('alcTypes.index',compact('alcType'))
        ->with('success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AlcType $alcType)
    {
        $alcType->delete();
        return redirect()
            ->route('alcTypes.index')
            ->with('success');
    }
}
