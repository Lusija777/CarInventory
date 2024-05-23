<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Part;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): \Illuminate\Contracts\View\View
    {
        $query = Part::query();
        if ($request->has('name')) {
            $query->where('name', 'like', '%'.$request->input('name').'%');
        }

        $parts = $query->get();
        return View::make('parts.index')
            ->with('parts', $parts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\View
    {
        $cars = Car::all();
        return View::make('parts.create')
            ->with('cars', $cars);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate(Part::getPartValidation());
        Part::create($validated);

        return redirect()->route('parts.index')
            ->with('success', 'Part created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Part $part)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Part $part): \Illuminate\Contracts\View\View
    {
        $cars = Car::all();
        return View::make('parts.edit')
            ->with('cars', $cars)
            ->with('part', $part);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Part $part): RedirectResponse
    {
        $validated = $request->validate(Part::getPartValidation($part->id));
        $part->update($validated);

        return redirect()->route('parts.index')
            ->with('success', 'Part updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Part $part): RedirectResponse
    {
        $part->delete();
        return redirect()->route('parts.index')
            ->with('success', 'Part deleted successfully.');
    }
}
