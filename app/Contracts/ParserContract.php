<?php declare(strict_types=1);

namespace App\Contracts;

interface ParserContract
{
    public function getParsedList(string $url) : array;
}