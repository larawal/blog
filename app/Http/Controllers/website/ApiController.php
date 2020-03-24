<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Articles;

class ApiController extends Controller
{
    public function listArticles()
    {
        $articles = Articles::getAll();
        return response()->json($articles);
    }

    public function showArticle($slug)
    {
        $article = Articles::getOneBySlug($slug);
        if(is_null($article) || !is_object($article))
        {
            abort(404);
        }
        return response()->json($article);
    }
}
