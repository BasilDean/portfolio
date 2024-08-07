<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuTranslation;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::with('translations')->get();
        return view('admin.menus.index', compact('menus'));
    }

    public function create()
    {
        return view('admin.menus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'url' => 'required|string|max:255',
            'type' => 'required|string|in:public,private',
            'group' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
        ]);

        $menu = Menu::create($request->only('url', 'type', 'group'));

        MenuTranslation::create([
            'menu_id' => $menu->id,
            'locale' => 'en',
            'name' => $request->name_en,
        ]);

        MenuTranslation::create([
            'menu_id' => $menu->id,
            'locale' => 'ru',
            'name' => $request->name_ru,
        ]);

        return redirect()->route('menus.index')->with('success', 'Menu created successfully.');
    }

    public function edit(Menu $menu)
    {
        $translation_en = $menu->getTranslation('en');
        $translation_ru = $menu->getTranslation('ru');

        return view('admin.menus.edit', compact('menu', 'translation_en', 'translation_ru'));
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'url' => 'required|string|max:255',
            'type' => 'required|string|in:public,private',
            'group' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
        ]);

        $menu->update($request->only('url', 'type', 'group'));

        $menu->translations()->updateOrCreate(
            ['locale' => 'en'],
            ['name' => $request->name_en]
        );

        $menu->translations()->updateOrCreate(
            ['locale' => 'es'],
            ['name' => $request->name_ru]
        );

        return redirect()->route('menus.index')->with('success', 'Menu updated successfully.');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menus.index')->with('success', 'Menu deleted successfully.');
    }
}
