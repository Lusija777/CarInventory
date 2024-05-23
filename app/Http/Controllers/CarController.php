<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\View;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request): \Illuminate\Contracts\View\View
    {
        $query = Car::query();
        if ($request->has('name')) {
            $query->where('name', 'like', '%'.$request->input('name').'%');
        }

        $cars = $query->get();
        return View::make('cars.index')
            ->with('cars', $cars);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\View
    {
        return View::make('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate(Car::getCarValidation());

        Car::create($validated);

        return redirect()->route('cars.index')
            ->with('success', 'Car created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car): \Illuminate\Contracts\View\View
    {
        $car->load('parts');
        return View::make('cars.show')
            ->with('car', $car);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car): \Illuminate\Contracts\View\View
    {
        return View::make('cars.edit')
            ->with('car', $car);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car): RedirectResponse
    {
        $validated = $request->validate(Car::getCarValidation($car->id));

        $car->update($validated);

        return redirect()->route('cars.index')
            ->with('success', 'Car updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car): RedirectResponse
    {
        $car->delete();
        return redirect()->route('cars.index')
            ->with('success', 'Car deleted successfully.');
    }
}
