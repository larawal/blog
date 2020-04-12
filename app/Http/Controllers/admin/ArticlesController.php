<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\admin\AdminController;
use Illuminate\Http\Request;
use App\Models\Articles;
use DataTables;

class ArticlesController extends AdminController
{
    const INDEX_VIEW = 'admin.articles.index';
    const EDIT_VIEW = 'admin.articles.edit';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function list(Request $request)
    {
        $query = Articles::getQueryObject();
        return DataTables::of($query)->make(true);
    }

    public function edit($slug = null)
    {
        $article = Articles::getOneBySlug($slug);
        if(!is_object($article)) abort(404);

        return view(self::EDIT_VIEW)->with('article', $article);
    }
}
