<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class AdminRestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Display list of all restaurants
        $restaurants = Restaurant::all();

        return view('admin.restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.restaurants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate request all needs to be filled and then store in database then teturn to admin.restaurants.index
        Restaurant::create($request->all());
        return redirect()->route('admin.restaurants.index')->with('success', 'Restaurant created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $restaurant = Restaurant::findOrFail($id);

        return view('admin.restaurants.show', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Get restaurant by ID with reviews

        $restaurant = Restaurant::with('reviews')->findOrFail($id);

        return view('admin.restaurants.edit', compact('restaurant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'rating' => 'required',
            'available_people' => 'required',
            // Add validation rules for all fields
        ]);

        $restaurant = Restaurant::findOrFail($id);

        $restaurant->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $restaurant = Restaurant::findOrFail($id);

        $restaurant->delete();

        // reddirec back with success message
        return redirect()->back()->with('success', 'Restaurant deleted successfully!');
        
    }
}
