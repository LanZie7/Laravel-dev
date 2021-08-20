<?php declare(strict_types=1);

namespace App\Services;

use App\Contracts\ParserContract;

class ParserService implements ParserContract
{
    public function getParsedList(string $url) : array
    {
        $xml = \XmlParser::load($url);

        $data = $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate]'
            ]
        ]);

        return $data;
    }
}