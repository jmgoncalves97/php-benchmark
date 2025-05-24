<?php

use App\Http\Router;
use App\Http\Controllers\Article;

$router = new Router();

$router->get('/', function () {
    return 'Welcome to the Mini CMS!';
});

$router->get('/articles', function () {
    return json_encode(Article::all(), JSON_PRETTY_PRINT);
});

$router->get('/articles/(\d+)', function ($id) {
    $article = Article::find($id);
    return $article ? json_encode($article, JSON_PRETTY_PRINT) : "Not Found";
});

$router->run();