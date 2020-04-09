<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\admin\AdminController;
use Illuminate\Http\Request;
use App\Models\Articles;
use DataTables;

class ArticlesController extends AdminController
{
    const INDEX_VIEW = 'admin.articles.index';

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
}
