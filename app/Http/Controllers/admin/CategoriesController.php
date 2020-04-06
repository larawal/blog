<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\admin\AdminController;
use Illuminate\Http\Request;
use App\Models\Categories;
use Validator;
use DB;

class CategoriesController extends AdminController
{
    const INDEX_VIEW = 'admin.categories.index';
    const LIST_VIEW = 'admin.categories.list';
    const ITEM_VIEW = 'admin.categories.item';
    const SCAFFOLDING_VIEW = 'admin.categories.scaffolding';

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

        $data = [
            'categories'        => Categories::getAll('rank')
        ];

        if(count($data['categories']) <= 0) {
            $result['message'] = 'Nessun dato presente a DB';
            return response()->json($result);
        }
        
        $result['status'] = true;
        $result['html'] = view(self::LIST_VIEW, ['tree' => self::_generateTree($data['categories'])])->render();
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
        
        return $result ? view(self::SCAFFOLDING_VIEW, ['items' => $result])->render() : null;
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
        if($validator->fails()) {
            $result['message'] = 'Errore validazione form';
            $result['errors']   = $validator->getMessageBag()->toArray();
            return response()->json($result);
        }
        
        $inserted_id = Categories::insertGetId($data);
        if($inserted_id <= 0) {
            $result['message'] = 'Errore durante l\'inserimento';
            return response()->json($result);
        }

        $result['status'] = true;
        $result['message'] = 'Categoria inserita';
        return response()->json($result);
    }
}
