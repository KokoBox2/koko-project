<?php

namespace App\Http\Controllers;

use App\Models\AlcBrand;
use App\Models\AlcType;
use Illuminate\Http\Request;

class AlcBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AlcType $alcType)
{
    $alcBrands = AlcType::where('alctype_id', $alcType->id)->get();

    return(view('alcBrands.index', ['alcBrands' => $alcBrands,'alcType'=> $alcType]));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create(AlcType $alcType)
    {
        return view('alcBrands.create',['alcTypes'=>$alcType]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, AlcType $alcType)
    {
        $validated=$request->validate([
            'alctype_id' => 'required|exists:alctypes,id',
            'name' => 'required|string|max:255',
            'alcpercent' => 'required|integer|min:0|max:100',
            'flavour' => 'required|string|max:255',
        ]);
        $validated['alctype_id'] = $alcType->id;
        $alcBrand = AlcBrand::create($validated);
        return redirect()
        ->route('alcBrands.index',['alcType'=>$alcType->id])
        ->with('status','Brand created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(AlcBrand $alcBrand)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AlcBrand $alcBrand, AlcType $alcType)
    {
        $alcType=AlcType::All();
        return view('alcBrands.edit', compact('alcBrand','alcTypes','alcType'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AlcBrand $alcBrand, AlcType $alcType)
    {
        $validated=$request->validate([
            'alctype_id' => 'required|exists:alctypes,id',
            'name' => 'required|string|max:255',
            'alcpercent' => 'required|integer|min:0|max:100',
            'flavour' => 'required|string|max:255',
        ]);

        $alcBrand->update($validated);
        return redirect()
        ->route('alcBrands.index',['alcType'=>$alcType->id])
        ->with('status','Brand updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AlcBrand $alcBrand, AlcType $alcType)
    {
        $alcBrand->delete();
        return redirect()
            ->route('alcBrands.index',['alcType'=>$alcType->id])
            ->with('status','Brand deleted successfully!');
    }
}
