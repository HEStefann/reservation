<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantTagsController extends Controller
{
    public function update(Request $request, Restaurant $restaurant)
    {
        $request->validate([
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id'
        ]);
        // $restaurant = Restaurant::with('tags')->findOrFail($restaurant->id);
        $restaurant->tags()->sync($request->input('tags'));

        return redirect()
            ->back()
            ->with('success', 'Restaurant tags updated successfully!');
    }
}
