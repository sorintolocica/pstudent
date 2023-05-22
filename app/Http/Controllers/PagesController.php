<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\NewsController;
use App\Models\News;

class PagesController extends Controller
{
    public function index()
    {
        $news = News::all();

        return view('pages.home', compact('news'));
    }

    public function news()
    {
        return view('pages.news');
    }

    public function news_post()
    {
        return view('pages.news-post');
    }

}
