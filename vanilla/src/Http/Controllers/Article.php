<?php

namespace App\Http\Controllers;

class Article
{
    public static function all(): array
    {
        coroutine_usleep(100_000); // Simulates a slow query of 100ms

        return [
            ['id' => 1, 'title' => 'First Post', 'body' => 'Lorem ipsum...'],
            ['id' => 2, 'title' => 'Second Post', 'body' => 'More content...'],
        ];
    }

    public static function find(int $id): ?array
    {
        foreach (self::all() as $article) {
            if ($article['id'] === $id) {
                return $article;
            }
        }
        return null;
    }
}
