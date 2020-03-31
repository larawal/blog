<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\admin\AdminController;
use Illuminate\Http\Request;

class ArticleController extends AdminController
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
}
