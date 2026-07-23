<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;

class NewsController extends Controller
{
    public function index(string $locale, ?string $categorySlug = null)
    {
        // $query = Article::published();
        $query = Article::where('is_published', true);
        $categories = Category::all();
        $activeCategory = null;

        if ($categorySlug) {
            $activeCategory = Category::where('slug', $categorySlug)->firstOrFail();
            $query->where('category_id', $activeCategory->id);
        }

        $articles = $query->paginate(9);

        return view('pages.news.index', compact('articles', 'categories', 'activeCategory'));
    }

    public function show(string $locale, string $article)
    {
        $article = Article::where('slug', $article)->firstOrFail();

        return view('pages.news.show', compact('article'));
    }
}