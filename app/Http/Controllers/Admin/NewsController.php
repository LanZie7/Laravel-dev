<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::with('category')->get();

        return view('admin.news.index', [
            'news' => $news
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.news.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsRequest $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:3', 'max:199'],
			'category_id' => ['required', 'integer', 'min:1'],
			'status' => ['required'],
			'description' => ['sometimes']
        ]);

        //curl get films --
		$data = $request->only(['category_id', 'title', 'status', 'description']);
		$data['slug'] = Str::slug($data['title']);



        $news = News::create($data);

		if($news) {
			return redirect()->route('admin.news.index')
				->with('success', 'Новость успешно создана');
		}

		return back()->with('error', 'Не удалось создать новость');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return response()->view('admin.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $categories = Category::all();
        return view('admin.news.edit', [
            'news' => $news,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(News $news, UpdateNewsRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);

        if($request->hasFile('image')) {
			$file = $request->file('image');
			$fileName = md5($file->getClientOriginalName() . time());
			$fileExt = $file->getClientOriginalExtension();

			$newFileName = $fileName . "." . $fileExt;

			$data['image'] = $file->storeAs('news', $newFileName, 'public');
		}

        $categoryStatus = $news->fill($data)->save();

        if($categoryStatus) {
            return redirect()->route('admin.news.index')
                ->with('success', 'Новость успешно добавлена');
        }
        return back()->with('error', 'Не удалось обновить запись');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // через ajax-запрос
    public function destroy(Request $request, News $news)
    {
        if ($request->ajax()) {
            try {
                $news->delete();
            } catch (\Exception $e) {
                report($e);
            }
        }
    }
}
