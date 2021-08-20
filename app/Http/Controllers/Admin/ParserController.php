<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ParserService;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    public function __invoke(Request $request)
    {
        $service = new ParserService();
        dd($service->getParsedList("https://news.yandex.ru/world.rss"));
    }
}
