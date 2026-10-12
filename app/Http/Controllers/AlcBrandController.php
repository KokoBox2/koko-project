<?php

namespace App\Http\Controllers;

use App\Models\AlcBrand;
use App\Models\AlcType;
use Illuminate\Http\Request;

class AlcBrandController extends Controller
{
    public function index(Request $request)
    {
        $alcTypes = AlcType::orderBy('name')->get();
        $alcBrands = AlcBrand::with('alcType')
            ->when($request->filled('search'), fn ($query) => $query->where(function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('flavour', 'like', '%' . $request->search . '%');
            }))
            ->when($request->filled('alctype_id'), fn ($query) => $query->where('alctype_id', $request->alctype_id))
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();

        return view('alcBrands.index', compact('alcBrands', 'alcTypes'));
    }

    public function create()
    {
        $alcTypes = AlcType::orderBy('name')->get();

        return view('alcBrands.create', compact('alcTypes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'alctype_id' => 'required|exists:alctypes,id',
            'name' => 'required|string|max:255',
            'alcpercent' => 'required|integer|between:0,100',
            'flavour' => 'required|string|max:255',
        ]);
        AlcBrand::create($validated);

        return redirect()->route('alcBrands.index')->with('status', 'A termék létrejött.');
    }

    public function edit(AlcBrand $alcBrand)
    {
        $alcTypes = AlcType::orderBy('name')->get();

        return view('alcBrands.edit', compact('alcBrand', 'alcTypes'));
    }

    public function update(Request $request, AlcBrand $alcBrand)
    {
        $validated = $request->validate([
            'alctype_id' => 'required|exists:alctypes,id',
            'name' => 'required|string|max:255',
            'alcpercent' => 'required|integer|between:0,100',
            'flavour' => 'required|string|max:255',
        ]);
        $alcBrand->update($validated);

        return redirect()->route('alcBrands.index')->with('status', 'A termék módosítva.');
    }

    public function destroy(AlcBrand $alcBrand)
    {
        $alcBrand->delete();

        return redirect()->route('alcBrands.index')->with('status', 'A termék törölve.');
    }
}
