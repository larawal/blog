<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Articles;

class FrontendController extends Controller
{
    public function home()
    {
        return view('layouts.front');
    }

    public function getArticle(string $slug = '')
    {
      if(strlen($slug) <= 0 || !is_string($slug)) abort(404);
      $article = Articles::getOneBySlug($slug);
      if(is_null($article) || !is_object($article))
      {
          abort(404);
      }
      return view('layouts.front');
    }

    //API
    public function article_index()
    {
        $articles = Articles::getAll();
        return response()->json($articles);
    }

    public function article_show($slug)
    {
        $article = Articles::getOneBySlug($slug);
        if(is_null($article) || !is_object($article))
        {
            abort(404);
        }
        return response()->json($article);
    }
}
