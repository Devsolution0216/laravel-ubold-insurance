<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Policies extends Model
{
    static function getIndex($curDate) {
        $datas = DB::select(
            "SELECT policies.*, brands.name AS brandname, models.name AS modelname, insurers.name AS insurername, pplans.* FROM policies
            LEFT JOIN brands ON policies.brand_id=brands.id
            LEFT JOIN models ON policies.model_id=models.id
            LEFT JOIN insurers ON policies.insurer_id=insurers.id
            LEFT JOIN (SELECT COUNT(*) AS aging, pplans.policies_id FROM pplans
                    LEFT JOIN policies ON pplans.policies_id=policies.id
            WHERE pplans.policies_id=policies.id AND pplans.expiration_date < '$curDate' AND pplans.status_id != 2 GROUP BY pplans.policies_id) AS pplans
            ON policies.id=pplans.policies_id"
        );
        return $datas;
    }

    static function get_plicies_excel () {
        $datas = Policies::leftJoin('brands', function($join){
            $join->on('policies.brand_id', '=', 'brands.id');
        })
        ->leftJoin('models', function($join){
            $join->on('policies.model_id', '=', 'models.id');
        })
        ->leftJoin('uses', function($join){
            $join->on('policies.use_id', '=', 'uses.id');
        })
        ->leftJoin('customers', function($join){
            $join->on('policies.customer_id', '=', 'customers.id');
        })
        ->leftJoin('insurers', function($join){
            $join->on('policies.insurer_id', '=', 'insurers.id');
        })
        ->leftJoin('tproducts', function($join){
            $join->on('policies.tproduct_id', '=', 'tproducts.id');
        })
        ->leftJoin('documents', function($join){
            $join->on('customers.document_id', '=', 'documents.id');
        })
        ->leftJoin('provinces', function($join){
            $join->on('customers.province_id', '=', 'provinces.id');
        })
        ->leftJoin('professions', function($join){
            $join->on('customers.profession_id', '=', 'professions.id');
        })
        ->leftJoin('subagents', function($join){
            $join->on('customers.subagent_id', '=', 'subagents.id');
        })
        ->select('policies.*', 'brands.name as brandname', 'models.name as modelname', 'uses.name as usename', 'customers.*', 'insurers.name as insurername', 'tproducts.name as tproductname', 'documents.name as documentname', 'provinces.name as provincename', 'professions.name as professionname', 'subagents.name as subagentname')
        ->get();

        return $datas;
    }

    static function getSearch($type, $dates) {
        $startDate = explode(" to ", $dates)[0];
        $endDate = explode(" to ", $dates)[1];
        $curDate = date('Y-m-d');
        $datas = DB::select(DB::raw(
            "SELECT policies.*, brands.name AS brandname, models.name AS modelname, insurers.name AS insurername, pplans.* FROM policies
            LEFT JOIN brands ON policies.brand_id=brands.id
            LEFT JOIN models ON policies.model_id=models.id
            LEFT JOIN insurers ON policies.insurer_id=insurers.id
            LEFT JOIN (SELECT COUNT(id) AS aging, policies_id FROM pplans
            WHERE policies_id=1 AND expiration_date > ". $curDate ." AND status_id !=2 GROUP BY policies_id) AS pplans
            ON policies.id=pplans.policies_id
            WHERE policies.$type > '". $startDate ."' AND policies.$type < '". $endDate ."'"
            
        ));
        return $datas;
    }
}
