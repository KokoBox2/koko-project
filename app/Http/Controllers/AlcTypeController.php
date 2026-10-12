<?php

namespace App\Http\Controllers;

use App\Models\AlcType;
use Illuminate\Http\Request;

class AlcTypeController extends Controller
{
    public function index(Request $request)
    {
        $alcTypes = AlcType::query()
            ->when($request->filled('search'), fn ($query) => $query->where('name', 'like', '%' . $request->search . '%'))
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();

        return view('alcTypes.index', compact('alcTypes'));
    }

    public function create()
    {
        return view('alcTypes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['name' => 'required|string|max:255']);
        AlcType::create($validated);

        return redirect()->route('alcTypes.index')->with('status', 'A kategória létrejött.');
    }

    public function edit(AlcType $alcType)
    {
        return view('alcTypes.edit', compact('alcType'));
    }

    public function update(Request $request, AlcType $alcType)
    {
        $validated = $request->validate(['name' => 'required|string|max:255']);
        $alcType->update($validated);

        return redirect()->route('alcTypes.index')->with('status', 'A kategória módosítva.');
    }

    public function destroy(AlcType $alcType)
    {
        $alcType->delete();

        return redirect()->route('alcTypes.index')->with('status', 'A kategória törölve.');
    }
}
