<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Base extends Model
{
    const TABLE_NAME = 'undefined';
    const TABLE_ID = 'id';
    const TABLE_SLUG = 'slug';
    const ORDER_BY = 'id';

    /**
     * Get all records.
     *
     * @return array
     */
    public static function getAll($orderBy = null)
    {
        return DB::table(static::TABLE_NAME)
                ->orderBy((!empty($orderBy) and is_string($orderBy)) ? $orderBy : static::ORDER_BY)
                ->get();
    }

    /**
     * Get all records by filters.
     *
     * @return array
     */
    public static function getAllByFilters($filters = null)
    {
        $query = DB::table(static::TABLE_NAME);
        if(strlen($filters) > 0) {
            $query = $query->whereRaw($filters);
        }
        return $query->get();
    }

    /**
     * Get one record by ID.
     *
     * @return object or null
     */
    public static function getOne($id = null)
    {
        return static::validId($id)
                ? DB::table(static::TABLE_NAME)
                    ->where(static::TABLE_ID, $id)
                    ->first()
                : null;
    }

    /**
     * Get one record by slug.
     *
     * @return object or null
     */
    public static function getOneBySlug($slug = null)
    {
        return is_string($slug) && strlen($slug) > 0
                ? DB::table(static::TABLE_NAME)
                    ->where(static::TABLE_SLUG, $slug)
                    ->first()
                : null;
    }

    /**
     * Return inserted record ID
     *
     * @return int
     */
    public static function insertGetId(array $data)
    {
        return DB::table(static::TABLE_NAME)
                ->insertGetId($data);
    }

    /**
     * Remove record by ID.
     *
     * @return bool
     */
    public static function remove($id = null)
    {
        return static::validId($id)
                ? DB::table(static::TABLE_NAME)
                ->where(static::TABLE_ID, $id)
                ->delete()
                : false;
    }

    /**
     * Update record by ID.
     *
     * @return bool or null
     */
    public static function alter($id, array $data)
    {
        return static::validId($id)
                ? DB::table(static::TABLE_NAME)
                ->where(static::TABLE_ID, $id)
                ->update($data)
                : null;
    }

    /**
     * Check if ID is valid.
     *
     * @return boolean
     */
    protected static function validId($id)
    {
        if($id === null)
        {
            return false;
        }
        $tmp = +$id;
        return (($tmp > 0) and ($tmp == $id));
    }
}
