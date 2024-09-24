<?php

namespace App\Http\Controllers\gymTracker;

use App\Http\Controllers\Controller;
use App\Models\gymTracker\Equipment;
use App\Models\gymTracker\EquipmentTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipments = Equipment::with('translations')->paginate(15);
        return view('layouts.gymTracker.sections.equipment.index', compact('equipments'));
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

        $equipment = Equipment::create($data);

        EquipmentTranslation::create([
            'equipment_id' => $equipment->id,
            'locale' => 'en',
            'title' => $data['locale_en'],
        ]);

        EquipmentTranslation::create([
            'body_part_id' => $equipment->id,
            'locale' => 'ru',
            'title' => $data['locale_ru'],
        ]);

        return response()->json(['success' => 'Equipment created successfully']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Equipment::with('translations')->findOrFail($id);
        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'locale_en' => 'required|string|max:255',
            'locale_ru' => 'required|string|max:255',
            'icon' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $equipment = Equipment::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('icon')) {
            // Delete the old icon if it exists
            if ($equipment->icon) {
                Storage::disk('public')->delete($equipment->icon);
            }

            $data['icon'] = $request->file('icon')->store('icons', 'public'); // Save the new icon
        }

        $equipment->update($data);
        $equipment->translations()->updateOrCreate(
            ['locale' => 'en'],
            ['title' => $request->locale_en]
        );

        $equipment->translations()->updateOrCreate(
            ['locale' => 'ru'],
            ['title' => $request->locale_ru]
        );

        return response()->json(['success' => 'Body part updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $equipment = Equipment::findOrFail($id);
        if ($equipment->icon) {
            $filePath = str_replace('images/bodyParts/', '', $equipment->icon);
            if (Storage::disk('body_parts')->exists($filePath)) {
                Storage::disk('body_parts')->delete($filePath);
            }
        }
        $equipment->delete();
        return response()->json(['success' => 'Body part deleted successfully']);
    }
}
