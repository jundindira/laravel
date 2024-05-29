<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('posts', compact('news'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $news = new News();
        $news->title = $request->title;
        $news->content = $request->content;
        $news->author_id = Auth::id();
        $news->save();

        return redirect()->route('home')->with('success', 'News added successfully');
    }
}
