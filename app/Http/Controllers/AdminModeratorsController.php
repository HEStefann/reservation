<?php

namespace App\Http\Controllers;

use App\Models\Moderator;
use Illuminate\Http\Request;

class AdminModeratorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Show moderator list
        $moderators = Moderator::all();
        return view('admin.moderators.index', compact('moderators'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //create moderator
        return view('admin.moderators.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Store moderator in storage
        $moderator = Moderator::create($request->all());
        return redirect()->route('admin.moderators.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //Show moderator by id
        $moderator = Moderator::findOrFail($id);
        return view('admin.moderators.show', compact('moderator'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //edit moderator by id
        $moderator = Moderator::findOrFail($id);
        return view('admin.moderators.edit', compact('moderator'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Update moderator by id
        $moderator = Moderator::findOrFail($id);
        $moderator->update($request->all());
        return redirect()->back()->with('success', 'Moderator updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Destroy moderator by id
        $moderator = Moderator::findOrFail($id);
        $moderator->delete();
        return redirect()->route('admin.moderators.index')->with('success', 'Moderator deleted successfully!');
    }
}
