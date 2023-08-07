<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRestaurantImagesRequest;
use App\Models\Restaurant;
use App\Models\RestaurantImage;
use Illuminate\Http\Request;

class RestaurantImageController extends Controller
{
    public function index(Restaurant $restaurant)
    {

        return back();
    }

    public function upload(StoreRestaurantImagesRequest $request, Restaurant $restaurant)
    {
        $images = $request->validated('images');

        foreach ($images as $image) {

            $imagePath = $image->store();

            $restaurant->images()->create([
                'image_url' => $imagePath
            ]);
        }

        return back()->with('success', 'Images uploaded successfully!');
    }

    public function reorder(Request $request)
    {

        // Validate request

        foreach ($request->order as $order => $id) {
            RestaurantImage::find($id)->update(['display_order' => $order]);
        }

        return response('Images reordered');
    }
}
