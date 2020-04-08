<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\admin\AdminController;
use Illuminate\Http\Request;
use App\Models\Categories;
use Validator;

class CategoriesController extends AdminController
{
    const INDEX_VIEW = 'admin.categories.index';
    const LIST_VIEW = 'admin.categories.list';
    const ITEM_VIEW = 'admin.categories.item';
    const SCAFFOLDING_VIEW = 'admin.categories.scaffolding';
    const DETAIL_VIEW = 'admin.categories.detail';

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

    public function list(Request $request)
    {
        $result = [
            'status'        => false,
            'message'       => '',
            'html'          => ''
        ];

        $categories = Categories::getAll('rank');

        if(count($categories) <= 0)
        {
            $result['message'] = self::MSG_NO_DATA;
            return response()->json($result);
        }
        
        $result['status'] = true;
        $result['html'] = view(self::LIST_VIEW, ['tree' => self::_generateTree($categories)])->render();
        return response()->json($result);
    }

    private function _generateTree($categories, $parent_id = null)
    {
        $result = null;

        foreach($categories as $item)
        {
            if ($item->parent_id === $parent_id)
            {
                $result .= view(self::ITEM_VIEW, ['categories' => $categories, 'item' => $item, 'fn' => self::_generateTree($categories, $item->id)])->render();
            }
        }
        
        return view(self::SCAFFOLDING_VIEW, ['items' => $result])->render();
    }

    public function saveTree(Request $request)
    {
        $result = [
            'status'        => false,
            'message'       => '',
        ];

        $tree = Categories::parseJsonArray(json_decode($request->input('tree'), true));
        Categories::changeParentById($tree);

        $result['message'] = static::MSG_UPDATED;
        $result['status'] = true;

        return response()->json($result);
    }

    public function add(Request $request)
    {
        $result = [
            'status'        => false,
            'message'       => ''
        ];

        $data = [
            'name'          => $request->input('name'),
            'slug'          => $request->input('slug'),
            'description'   => $request->input('description'),
            'is_active'     => $request->input('is_active'),
            'parent_id'     => $request->input('parent')
        ];

        $rules = [
            'name'                  => 'required|string|max:255',
            'slug'                  => 'required|string|unique:categories,slug',
            'is_active'             => 'required|boolean',
            'parent_id'             => 'integer|nullable'
        ];

        $validator = Validator::make($data, $rules);
        if($validator->fails())
        {
            $result['message'] = self::MSG_ERROR_VALIDATION_FORM;
            $result['errors'] = $validator->getMessageBag()->toArray();
            return response()->json($result);
        }
        
        $inserted_id = Categories::insertGetId($data);
        if($inserted_id <= 0)
        {
            $result['message'] = self::MSG_ERROR_INSERT;
            return response()->json($result);
        }

        $result['status'] = true;
        $result['message'] = self::MSG_INSERTED;
        return response()->json($result);
    }

    public function detail(Request $request)
    {
        $result = [
            'status'        => false,
            'message'       => '',
            'html'          => ''
        ];
        
        $category = Categories::getOne($request->input('id'));

        if(is_null($category))
        {
            $result['message'] = self::MSG_NO_DATA;
            return response()->json($result);
        }
        
        $result['status'] = true;
        $result['html'] = view(self::DETAIL_VIEW, ['category' => $category])->render();
        return response()->json($result);
    }

    public function save(Request $request)
    {
        $result = [
            'status'        => false,
            'message'       => ''
        ];

        $data = [
            'id'            => $request->input('id'),
            'name'          => $request->input('name'),
            'slug'          => $request->input('slug'),
            'description'   => $request->input('description'),
            'is_active'     => $request->input('is_active')
        ];

        $rules = [
            'id'                    => 'required|integer|unique:categories,id,'.$request->input('id'),
            'name'                  => 'required|string|max:255',
            'slug'                  => 'required|string|unique:categories,slug,'.$request->input('id'),
            'is_active'             => 'required|boolean'
        ];

        $validator = Validator::make($data, $rules);
        if($validator->fails())
        {
            $result['message'] = self::MSG_ERROR_VALIDATION_FORM;
            $result['errors'] = $validator->getMessageBag()->toArray();
            return response()->json($result);
        }
        
        $update = Categories::alter($request->input('id'), $data);
        if(is_null($update) || !$update)
        {
            $result['message'] = self::MSG_ERROR_UPDATE;
            return response()->json($result);
        }

        $result['status'] = true;
        $result['message'] = self::MSG_UPDATED;
        return response()->json($result);
    }

    public function remove(Request $request)
    {
        $result = [
            'status'        => false,
            'message'       => ''
        ];

        $record = Categories::getOne($request->input('id'));
        if(is_null($record) || !is_object($record))
        {
            $result['message'] = self::MSG_NO_DATA;
            return response()->json($result);
        }
        
        $remove = Categories::remove($request->input('id'));
        if(!$remove)
        {
            $result['message'] = self::MSG_ERROR_DELETE;
            return response()->json($result);
        }

        $result['status'] = true;
        $result['message'] = self::MSG_DELETED;
        return response()->json($result);
    }
}
