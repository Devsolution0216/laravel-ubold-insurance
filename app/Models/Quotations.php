<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Quotations extends Model
{
    static function getIndex($where) {
        $datas     = DB::select(
            "SELECT quotations.*, tinsurers.name AS tinsurername, brands.name brandname, models.name modelname, uses.name AS usename, statuses.name AS statusname, users.name AS username FROM quotations
            LEFT JOIN tinsurers ON quotations.tinsurer_id=tinsurers.id
            LEFT JOIN brands ON quotations.brand_id=brands.id
            LEFT JOIN models ON quotations.model_id=models.id
            LEFT JOIN uses ON quotations.use_id=uses.id
            LEFT JOIN statuses ON quotations.status_id=statuses.id
            LEFT JOIN users ON quotations.user_id=users.id
            $where"
        );
        return $datas;
    }

    static function getMatch($insurer_id, $brand_id, $model_id, $year) {
        $result     = DB::select(
            "SELECT escenaries.*, insurers.logo, insurers.name as insurername, tproducts.name as tproductname, brands.name as brandname, models.name as modelname FROM escenaries
            LEFT JOIN insurers
            ON insurers.id = escenaries.insurer_id
            LEFT JOIN tproducts
            ON tproducts.id = escenaries.tproduct_id
            LEFT JOIN brands
            ON brands.id = escenaries.brand_id
            LEFT JOIN models
            ON models.id = escenaries.model_id
            WHERE escenaries.insurer_id IN (SELECT id FROM insurers WHERE insurers.type_id = $insurer_id)
            AND escenaries.brand_id = $brand_id
            AND escenaries.model_id = $model_id
            AND escenaries.year = '$year'"
        );
        return $result;
    }

    static function getLastID () {
        return DB::table('quotations')->latest()->first();
    }
}
