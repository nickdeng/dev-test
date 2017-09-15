<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Carbon\Carbon;

class BlogController extends Controller
{
    public function index()
    {
        $articles = Article::where('published_at', '<=', Carbon::now())
                ->orderBy('published_at', 'desc')
                ->paginate(config('blog.posts_per_page'));

        return view('blog.index', compact('articles'));
    }

    public function showPost($slug)
    {
        $article = Article::whereSlug($slug)->firstOrFail();
        return view('blog.article')->withArticle($article);
    }
}