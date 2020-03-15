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
                ->orderBy((!empty($orderBy) && is_string($orderBy)) ? $orderBy : static::ORDER_BY)
                ->get();
    }

    /**
     * Get one record.
     *
     * @return array
     */
    public static function getOne($id = null)
    {
        return DB::table(static::TABLE_NAME)
                ->where("id", static::validId($id))
                ->get();
    }

    /**
     * Insert records.
     *
     * @return int
     */
    public static function insertGetId(array $data)
    {
        return DB::table(static::TABLE_NAME)
                ->insertGetId($data);
    }

    /**
     * Remove records.
     *
     * @return bool
     */
    public static function remove($id = null)
    {
        return DB::table(static::TABLE_NAME)
                ->where("id", static::validId($id))
                ->delete();
    }

    /**
     * Update records.
     *
     * @return bool
     */
    public static function alter($id, array $data)
    {
        return DB::table(static::TABLE_NAME)
                ->where("id", static::validId($id))
                ->update($data);
    }

    /**
     * Check if ID is valid.
     *
     * @return int
     */
    protected static function validId($id)
    {
        if(is_int($id))
        {
            return $id;
        }
    }
}

