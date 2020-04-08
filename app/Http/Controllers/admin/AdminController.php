<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    const INDEX_VIEW = 'undefined';
    const LIST_VIEW = 'undefined';
    const ITEM_VIEW = 'undefined';
    const SCAFFOLDING_VIEW = 'undefined';
    const DETAIL_VIEW = 'undefined';
    const MSG_NO_DATA = 'No such data on DB';
    const MSG_ERROR_VALIDATION_FORM = 'Error on validation form';
    const MSG_ERROR_INSERT = 'Error on insert';
    const MSG_ERROR_UPDATE = 'Error on update';
    const MSG_ERROR_DELETE = 'Error on delete';
    const MSG_INSERTED = 'Inserted';
    const MSG_UPDATED = 'Updated';
    const MSG_DELETED = 'Deleted';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view(static::INDEX_VIEW);
    }
}
