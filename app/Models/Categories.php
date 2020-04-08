<?php

namespace App\Models;

class Categories extends Base
{
    const TABLE_NAME = 'categories';

    public static function changeParentById($data)
    {
        foreach ($data as $key => $value)
        {
            $item = Categories::find($value['id']);
            $item->parent_id = $value['parentID'];
            $item->rank = $key + 1;
            $item->save();
        }
    }

    public static function parseJsonArray($jsonArray, $parentID = null)
    {
        $return = array();

        foreach ($jsonArray as $subArray)
        {
            $returnSubArray = array();

            if(isset($subArray['children'])) {
                $returnSubArray = self::parseJsonArray($subArray['children'], $subArray['id']);
            }

            $return[] = array('id' => $subArray['id'], 'parentID' => $parentID);
            $return = array_merge($return, $returnSubArray);
        }

        return $return;
    }
}
