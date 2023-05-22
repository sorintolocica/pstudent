<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();

        return view('pages.news', compact('news'));
    }

    public function showAddForm()
    {
        return view('pages.add-news');
    }

    public function show($id)
    {
        $news = News::findOrFail($id);

        return view('pages.news-post', compact('news'));
    }

    public function addNews(Request $request)
    {
        // Validați datele primite prin formular
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|exists:categories,id', // Validați că categoria selectată există în tabela de categorii
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news_images', 'public');
            $validatedData['image'] = $imagePath;
        }

        // Salvăm noutatea în baza de date
        $news = News::create($validatedData);

        // Atribuim categoria selectată la știre
        $category = Category::find($request->input('category'));
        $news->category()->associate($category);
        $news->save();

        // Redirecționăm utilizatorul înapoi pe pagina de adăugare a noutăților cu un mesaj de succes
        return redirect()->route('add-news')->with('success', 'Noutatea a fost adăugată cu succes.');
    }

    public function newsByCategory($category_id)
    {
        $category = Category::findOrFail($category_id);
        $news = $category->news;

        return view('pages.show-category', compact('category', 'news'));
    }
}
