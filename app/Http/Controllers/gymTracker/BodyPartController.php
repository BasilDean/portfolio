<?php

namespace App\Http\Controllers\gymTracker;

use App\Http\Controllers\Controller;
use App\Models\gymTracker\BodyPart;
use Illuminate\Http\Request;

class BodyPartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bodyParts = BodyPart::with('translations')->paginate(2);
        return view('layouts.gymTracker.sections.bodyParts.index', compact('bodyParts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.menus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $bodyPart = new BodyPart($request->all());

        if ($request->hasFile('icon')) {
            $bodyPart->icon = $request->file('icon')->store('icons/body_parts', 'public');
        }

        $bodyPart->save();

        return redirect()->route('body_parts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BodyPart $bodyPart)
    {
        $bodyPart->delete();
        return redirect()->route('gymtracker.bodyparts.index')->with('success', 'Body part deleted successfully.');
    }
}
