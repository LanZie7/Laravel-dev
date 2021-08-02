<?php

namespace App\Http\Controllers;

use App\Http\Requests\News\StoreNewsRequest;
use App\Http\Requests\NewsShowRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\Category;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with('category')->get();
        // dd($news);
        return view('news.index', compact('news'));
    }

    public function show(News $news)
    {
        return response()
            ->view('news.show', compact('news'));
            // ->header('x-app-type', 'news-page');
            // return view('news.show', compact('news'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('news.create', compact('categories'));
    }

    public function store(StoreNewsRequest $request)
    {
        News::create($request->validated([
            'title' => ['required', 'string', 'min:3', 'max:199'],
			'category_id' => ['required', 'integer', 'min:1'],
            'slug' => ['required'],
			'status' => ['required'],
			'description' => ['sometimes']
        ]));

        return redirect()->route('news.index')->with('success', 'Новость успешно добавлена');
    }

    public function edit(News $news)
    {
        $categories = Category::all();
        return view('news.update', compact('categories', 'news'));
    }

    public function update(News $news, UpdateNewsRequest $request)
    {
        $news->update($request->validated());

        //@TODO add event on update

        return redirect()->route('news.index')->with('success', 'Новость успешно обновлена');
    }
}
