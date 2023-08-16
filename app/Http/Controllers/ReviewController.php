<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    // index
    public function index(){}
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'rating' => 'required',
        ]);

        // Create a new review
        $review = new Review();
        $review->reservation_id = $request->reservation_id;
        $review->description = $request->description;
        $review->user_id = auth()->user()->id;
        $review->restaurant_id = $review->reservation->restaurant->id;
        $review->rating = $request->rating;
        $review->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Review submitted successfully!');
    }
}
