<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('pages.news', compact('categories'));
    }

    public function create()
    {
        return view('pages.add-category');
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->input('name');
        $category->save();

        return redirect()->route('pages.add-category')->with('success', 'Categoria a fost adăugată cu succes.');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $category->name = $request->input('name');
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Categoria a fost actualizată cu succes.');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Categoria a fost ștearsă cu succes.');
    }
}
