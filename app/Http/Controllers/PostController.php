<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class PostController extends Controller
{
    public function index()
    {
        $posts = app(Pipeline::class)
            ->send(Post::query())
            ->through([
                \App\QueryFilters\Active::class,
                \App\QueryFilters\Sort::class,
            ])
            ->thenReturn()->get();

        return view('index', compact('posts'));
    }
}
