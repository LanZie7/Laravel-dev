<?php declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\ParserContract;
use App\Http\Controllers\Controller;

class ParserController extends Controller
{
    public function __invoke(Request $request, ParserContract $service)
    {
        dd($service->getParsedList("https://news.yandex.ru/world.rss"));
    }
}
