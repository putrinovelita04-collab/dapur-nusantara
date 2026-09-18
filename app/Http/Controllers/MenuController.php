<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::withCount('menus')->get();

        $menus = Menu::active()
            ->with('category')
            ->when($request->category, fn ($q) => $q->where('category_id', $request->category))
            ->latest()
            ->paginate(9)
            ->withQueryString();

        return view('menu.index', compact('menus', 'categories'));
    }

    public function show(string $slug)
    {
        $menu = Menu::active()->with(['category', 'images'])->where('slug', $slug)->firstOrFail();

        $related = Menu::active()
            ->where('category_id', $menu->category_id)
            ->where('id', '!=', $menu->id)
            ->take(3)
            ->get();

        return view('menu.show', compact('menu', 'related'));
    }
}
