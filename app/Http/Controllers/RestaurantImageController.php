<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRestaurantImagesRequest;
use App\Models\Restaurant;
use App\Models\RestaurantImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
            $randomName = Str::random(20);

            $imageName = $randomName . '.' . $image->getClientOriginalExtension();

            $image->storeAs('public/images', $imageName);

            while (RestaurantImage::where('image_url', $imageName)->exists()) {
                $randomName = Str::random(20);
                $imageName = $randomName . '.' . $image->getClientOriginalExtension();
            }

            $restaurant->images()->create([
                'image_url' => $imageName
            ]);
        }

        return back()->with('success', 'Images uploaded!');
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
