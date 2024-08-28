<?php

namespace App\Http\Controllers\gymTracker;

use App\Http\Controllers\Controller;
use App\Models\gymTracker\BodyPart;
use App\Models\gymTracker\BodypartTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BodyPartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bodyParts = BodyPart::with('translations')->paginate(15);
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
            'locale_en' => 'required|string|max:255',
            'locale_ru' => 'required|string|max:255',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('icon')) {
            $filename = Str::slug($data['locale_en']) . '_' . time() . '.' . $request->icon->extension();
            $path = $request->icon->storeAs('', $filename, 'body_parts'); // Save the icon
            $data['icon'] = 'images/bodyParts/' . $filename; // Store the relative path in the database
        }

        $bodypart = BodyPart::create($data);

        BodypartTranslation::create([
            'body_part_id' => $bodypart->id,
            'locale' => 'en',
            'title' => $data['locale_en'],
        ]);

        BodypartTranslation::create([
            'body_part_id' => $bodypart->id,
            'locale' => 'ru',
            'title' => $data['locale_ru'],
        ]);

        return response()->json(['success' => 'Body part created successfully']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = BodyPart::findOrFail($id);
        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $bodyPart = BodyPart::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('icon')) {
            // Delete the old icon if it exists
            if ($bodyPart->icon) {
                Storage::disk('public')->delete($bodyPart->icon);
            }

            $data['icon'] = $request->file('icon')->store('icons', 'public'); // Save the new icon
        }

        $bodyPart->update($data);

        return response()->json(['success' => 'Body part updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bodyPart = BodyPart::findOrFail($id);
        if ($bodyPart->icon) {
            $filePath = str_replace('images/bodyParts/', '', $bodyPart->icon);
            if (Storage::disk('body_parts')->exists($filePath)) {
                Storage::disk('body_parts')->delete($filePath);
            }
        }
        $bodyPart->delete();
        return response()->json(['success' => 'Body part deleted successfully']);
    }
}
