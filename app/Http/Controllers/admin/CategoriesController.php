<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\admin\AdminController;
use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesController extends AdminController
{
    const INDEX_VIEW = 'admin.categories.index';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function getParents(Request $request)
    {
        return response()->json([
            'status'        => true,
            'list'          => Categories::pluck('name','slug')
        ]);
    }
}
