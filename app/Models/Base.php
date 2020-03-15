<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Base extends Model
{
    const TABLE_NAME = null;
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
     * Get one record by ID.
     *
     * @return object or null
     */
    public static function getOne($id = null)
    {
        return static::validId($id)
                ? DB::table(static::TABLE_NAME)
                    ->where('id', $id)
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
                ->where('id', $id)
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
                ->where('id', $id)
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

