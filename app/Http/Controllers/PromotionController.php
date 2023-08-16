<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PromotionController extends Controller
{
    public function store(Request $request, Restaurant $restaurant)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust image validation as needed
        ]);

        // Upload and store the image if provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('promotion_images', 'public');
        }

        // Create a new promotion
        $promotion = Promotion::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image' => isset($imagePath) ? $imagePath : null,
            'restaurant_id' => $restaurant->id,
        ]);

        return redirect()->route('restaurant.settings.index', ['restaurant' => $restaurant->id])
            ->with('success', 'Promotion created successfully.');
    }

    public function edit(Restaurant $restaurant, Promotion $promotion)
    {
        return view('restaurant.promotionedit', compact('restaurant', 'promotion'));
    }

    public function update(Request $request, Restaurant $restaurant, Promotion $promotion)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust image validation as needed
        ]);

        // Delete existing image if user wants to update it
        if ($request->hasFile('image') && $promotion->image) {
            Storage::disk('public')->delete($promotion->image);
        }

        // Upload and store the new image if provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('promotion_images', 'public');
        }

        // Update the promotion
        $promotion->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image' => isset($imagePath) ? $imagePath : $promotion->image,
        ]);

        return redirect()->route('restaurant.settings.index', ['restaurant' => $restaurant->id])
            ->with('success', 'Promotion updated successfully.');
    }

    public function destroy(Restaurant $restaurant, Promotion $promotion)
    {
        // Delete the promotion's image from storage if it exists
        if ($promotion->image) {
            Storage::disk('public')->delete($promotion->image);
        }

        // Delete the promotion
        $promotion->delete();

        return redirect()->route('restaurant.settings.index', ['restaurant' => $restaurant->id])
            ->with('success', 'Promotion deleted successfully.');
    }
}
