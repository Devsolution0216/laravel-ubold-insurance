<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Quotations;
use App\Models\Tinsurers;
use App\Models\Brands;
use App\Models\Uses;
use App\Models\Models;
use App\Models\Statuses;
use App\Models\Escenaries;
use App\Models\Insurers;

use PDF;
use Redirect;
use Auth;
use File;
use DB;

class QuotationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $userID = Auth::user()->id;
        $where = 'WHERE quotations.user_id = ' . $userID;
        $permission = DB::table('model_has_roles')
                    ->leftJoin('role_has_permissions', 'model_has_roles.role_id', '=', 'role_has_permissions.role_id')
                    ->leftJoin('permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
                    ->where('model_has_roles.model_id', '=', $userID)
                    ->pluck('name')[0];

        if ($permission == "users_manage") {
            $where = '';
        }
        $datas = Quotations::getIndex($where);

        return view('quotations.index')
        ->with('datas', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tinsurers  = Tinsurers::all();
        $brands     = Brands::all();
        $uses       = Uses::all();
        $statuses   = Statuses::all();
        return view('quotations.create')
        ->with('tinsurers', $tinsurers)
        ->with('brands', $brands)
        ->with('uses', $uses)
        ->with('statuses', $statuses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $matchDatas = Quotations::getMatch($request->insurer, $request->brand, $request->model, $request->year);
        if (!$matchDatas) {
            return "No Match";
        }
        $marketValue                = $this->str2dbl($request->marketValue);
        $boolGas                    = $request->boolGas;
        $indexID                    = Quotations::getLastID();
        $prospect                   = $request->prospect;
        $cellphone                  = $request->cellphone;
        $email                      = $request->email;
        $city                       = $request->city;
        $brand                      = Brands::find($request->brand)->name;
        $model                      = Models::find($request->model)->name;
        $year                       = $request->year;
        $use                        = Uses::find($request->use)->name;
        
        if (!$indexID)
            $indexID = 1;
        else {
            $indexID = $indexID->number + 1;
        }
        $number                     = '';
        for ($i = 0; $i < 7 - strlen($indexID); $i++){
            $number                 .= 0;
        }
        $number                     = $number . $indexID;
        $filename                   = $this->savePDF($matchDatas, $marketValue, $boolGas, $number, $prospect, $cellphone, $email, $city, $brand, $model, $year, $use);
        
        $quotation                  = new Quotations;
        $quotation->tinsurer_id     = $request->insurer;
        $quotation->responsable     = $request->responsable;
        $quotation->brand_id        = $request->brand;
        $quotation->model_id        = $request->model;
        $quotation->year            = $request->year;
        $quotation->use_id          = $request->use;
        $quotation->marketValue     = $marketValue;
        $quotation->boolGas         = $boolGas;
        $quotation->prospect        = $request->prospect;
        $quotation->age             = $request->age;
        $quotation->cellphone       = $this->phone2dbl($request->cellphone);
        $quotation->email           = $request->email;
        $quotation->city            = $request->city;
        $quotation->address         = $request->address;
        $quotation->status_id       = $request->status;
        $quotation->user_id         = Auth::user()->id;
        $quotation->observaciones   = $request->observaciones;
        $quotation->pdf             = $filename;
        $quotation->number          = $indexID;

        $quotation->save();
        
        return $matchDatas;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Quotations::leftJoin('tinsurers', function($join){
            $join->on('quotations.tinsurer_id', '=', 'tinsurers.id');
        })
        ->leftJoin('brands', function($join){
            $join->on('quotations.brand_id', '=', 'brands.id');
        })
        ->leftJoin('models', function($join){
            $join->on('quotations.model_id', '=', 'models.id');
        })
        ->leftJoin('uses', function($join){
            $join->on('quotations.use_id', '=', 'uses.id');
        })
        ->leftJoin('statuses', function($join){
            $join->on('quotations.status_id', '=', 'statuses.id');
        })
        ->leftJoin('users', function($join){
            $join->on('quotations.user_id', '=', 'users.id');
        })
        ->select('quotations.*', 'tinsurers.name as tinsurername', 'brands.name as brandname', 'models.name as modelname', 'uses.name as usename', 'statuses.name as statusname', 'users.name as username')
        ->find($id);

        return view('quotations.show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data       = Quotations::leftJoin('users', function($join){
            $join->on('quotations.user_id', '=', 'users.id');
        })
        ->select('quotations.*', 'users.name as username')
        ->find($id);
        $tinsurers  = Tinsurers::all();
        $brands     = Brands::all();
        $uses       = Uses::all();
        $statuses   = Statuses::all();

        $matchDatas = Quotations::getMatch($data->tinsurer_id, $data->brand_id, $data->model_id, $data->year);

        return view('quotations.edit')
        ->with('data', $data)
        ->with('tinsurers', $tinsurers)
        ->with('brands', $brands)
        ->with('uses', $uses)
        ->with('statuses', $statuses)
        ->with('matchdatas', $matchDatas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $matchDatas = Quotations::getMatch($request->insurer, $request->brand, $request->model, $request->year);
        if (!$matchDatas) {
            return "No Match";
        }
        $quotation                  = Quotations::find($id);

        $marketValue                = $this->str2dbl($request->marketValue);
        $boolGas                    = $request->boolGas;
        $indexID                    = Quotations::getLastID()->number;
        $number                     = '';
        for ($i = 0; $i < 7 - strlen($indexID); $i++){
            $number                 .= 0;
        }
        $number                     = $number . $indexID;
        $prospect                   = $request->prospect;
        $cellphone                  = $request->cellphone;
        $email                      = $request->email;
        $city                       = $request->city;
        $brand                      = Brands::find($request->brand)->name;
        $model                      = Models::find($request->model)->name;
        $year                       = $request->year;
        $use                        = Uses::find($request->use)->name;

        $filename                   = $this->savePDF($matchDatas, $marketValue, $boolGas, $number, $prospect, $cellphone, $email, $city, $brand, $model, $year, $use);
        File::delete(public_path() . '/uploads/pdfs/' . $quotation->pdf);

        $quotation->tinsurer_id     = $request->insurer;
        $quotation->responsable     = $request->responsable;
        $quotation->brand_id        = $request->brand;
        $quotation->model_id        = $request->model;
        $quotation->year            = $request->year;
        $quotation->use_id          = $request->use;
        $quotation->marketValue     = $marketValue;
        $quotation->boolGas         = $request->boolGas;
        $quotation->prospect        = $request->prospect;
        $quotation->age             = $request->age;
        $quotation->cellphone       = $this->phone2dbl($request->cellphone);
        $quotation->email           = $request->email;
        $quotation->city            = $request->city;
        $quotation->address         = $request->address;
        $quotation->status_id       = $request->status;
        $quotation->user_id         = Auth::user()->id;
        $quotation->observaciones   = $request->observaciones;
        $quotation->pdf             = $filename;

        $quotation->save();
        return $matchDatas;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quotation  = Quotations::find($id);
        $pdf        = $quotation->pdf;
        $quotation->delete();
        File::delete(public_path() . '/uploads/pdfs/' . $pdf);
    }

    public function getMatch($insurer_id, $brand_id, $model_id, $year) {
        $insurer_id     = $request->insurer_id;
        $brand_id       = $request->brand_id;
        $model_id       = $request->model_id;
        $year           = $request->year;
        
        $escenaries     = DB::select(DB::raw(
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
                        ));
        return $escenaries;
    }

    public function savePDF($datas, $marketValue, $bookGas, $number, $prospect, $cellphone, $email, $city, $brand, $model, $year, $use) {
        
        $cur_time = date("YmdHis");
        $filename = $cur_time .'.pdf';
        $curDate = date("Y-m-d");
        $toDate = date("Y-m-d", strtotime("+5 days"));
        $htmlTable = '';
        $index = 0;

        foreach ($datas as $data) {
            $premium = 0;
            $logo = '';

            if ($bookGas == 1)
                $premium = $marketValue / 100 * $data->gas;
            else
                $premium = $marketValue / 100 * $data->gasoline;
            
            if ($data->logo != '') {
                $logo = '<img src="' . public_path() . '/uploads/logogs/' . $data->logo . '" height="40px;" />';
            }
            $index ++;
            $htmlTable .= '
            <tr>
                <td>'. $index .'</td>
                <td>'. $logo .'</td>
                <td>'. $data->insurername .'</td>
                <td>'. $data->tproductname .'</td>
                <td>'. $data->abbreviation .'</td>
                <td>'. number_format($data->compressive, 2) .'%</td>
                <td>'. $data->deductibles .'</td>
                <td>'. $data->judicial .'</td>
                <td>'. $data->civil .'</td>
                <td>'. $data->personal .'</td>
                <td>'. $data->road .'</td>
                <td>'. $data->vehicle .'</td>
                <td>'. $data->motor .'</td>
                <td>$'. number_format($premium, 2) .'</td>
            </tr>';
        }

        $html = '
        <style>
            .data-table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }
            .data-row {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }
            th {
                font-size: 15px;
                font-weight: bold;
                padding-left: 5px;
                padding-bottom: 3px;
                text-transform: uppercase;
            }

        </style>
        <table width="100%">
        <tr>
            <td width="20%"><img src="'.public_path().'/assets/images/logo-dark.png" height="50px;"></td>
            <td width="60%" style="text-align:center;"><font size="45px;">'. __('quotations.vehicle policy quote') .'</font></td>
            <td width="20%" style="text-align:right;"><font color="red" size="20px;">'. $number .'</font></td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align:center;"><font size="20px;">'. __('quotations.valid form') .'</font> <font color="red" size="20px;">'. $curDate. '</font> <font size="20px;">to</font> <font size="20px;" color="red">'. $toDate .'</font></td>
            <td></td>
        </tr>
        </table>
        <br>
        <table width="100%">
        <tr>
            <td width="10%"></td>
            <td width="35%" style="text-align:center;"><font size="25px;"><u>'. __('quotations.client information') .'</u></font></td>
            <td width="10%"></td>
            <td width="35%" style="text-align:center;"><font size="25px;"><u>'. __('quotations.vehicle information') .'</u></font></td>
            <td width="10%"></td>
        </tr>
        </table>
        <table width="100%">
        <tr>
            <td width="5%"></td>
            <td width="20%"><font size="20px;">'. __('quotations.prospect name') .' :</font></td>
            <td width="20%"><font size="20px;" color="red">'. $prospect .'</font></td>
            <td width="10%"></td>
            <td width="20%"><font size="20px;">'. __('quotations.brand') .' :</font></td>
            <td width="20%"><font size="20px;" color="red">'. $brand .'</font></td>
            <td width="5%"></td>
        </tr>
        <tr>
            <td width="5%"></td>
            <td width="20%"><font size="20px;">'. __('quotations.cell phone') .' :</font></td>
            <td width="20%"><font size="20px;" color="red">'. $cellphone .'</font></td>
            <td width="10%"></td>
            <td width="20%"><font size="20px;">'. __('parameters.model') .' :</font></td>
            <td width="20%"><font size="20px;" color="red">'. $model .'</font></td>
            <td width="5%"></td>
        </tr>
        <tr>
            <td width="5%"></td>
            <td width="20%"><font size="20px;">'. __('customers.email') .' :</font></td>
            <td width="20%"><font size="20px;" color="red">'. $email .'</font></td>
            <td width="10%"></td>
            <td width="20%"><font size="20px;">'. __('parameters.market value') .' :</font></td>
            <td width="20%"><font size="20px;" color="red">'. number_format($marketValue, 2) .'</font></td>
            <td width="5%"></td>
        </tr>
        <tr>
            <td width="5%"></td>
            <td width="20%"><font size="20px;">'. __('customers.city') .' :</font></td>
            <td width="20%"><font size="20px;" color="red">'. $city .'</font></td>
            <td width="10%"></td>
            <td width="20%"><font size="20px;">'. __('parameters.year') .' :</font></td>
            <td width="20%"><font size="20px;" color="red">'. $year .'</font></td>
            <td width="5%"></td>
        </tr>
        <tr>
            <td width="5%"></td>
            <td width="20%"><font size="20px;"></font></td>
            <td width="20%"><font size="20px;" color="red"></font></td>
            <td width="10%"></td>
            <td width="20%"><font size="20px;">'. __('quotations.type of use') .' :</font></td>
            <td width="20%"><font size="20px;" color="red">'. $use .'</font></td>
            <td width="5%"></td>
        </tr>
        <br>
        </table>
        <table class="data-table" border="1px;">
            <tr class="data-row" bgcolor="gainsboro">
                <th>#</th>
                <th>'. __('parameters.logo') .'</th>
                <th>'. __('parameters.insurance company') .'</th>
                <th>'. __('parameters.product name') .'</th>
                <th>'. __('quotations.product abbreviation') .'</th>
                <th>'. __('parameters.compressive risk') .'</th>
                <th>'. __('parameters.deductibles') .'</th>
                <th>'. __('parameters.judicial deposit') .'</th>
                <th>'. __('quotations.civil') .'</th>
                <th>'. __('parameters.personal accidents cond') .'</th>
                <th>'. __('parameters.road') .'</th>
                <th>'. __('parameters.vehicle') .'</th>
                <th>'. __('parameters.motor') .'</th>
                <th>'. __('policies.premium month') .'</th>
            </tr>
            '. $htmlTable .'
        </table>
        <br>
        <center><font size="17px">'. __('quotations.all deductibles do not include iva tax') .'</font></center>
        <center><font size="17px">'. __('quotations.premiums quoted are approximate and are subject to variation') .'</font></center>
        ';
        
        PDF::loadHTML($html)->setPaper('A3', 'landscape')->save(public_path().'/uploads/pdfs/'. $filename);
        return $filename;
    }

    public function phone2dbl($string) {
        $string = str_replace('(', '', $string);
        $string = str_replace(')', '', $string);
        $string = str_replace('-', '', $string);
        return (double)$string;
    }

    public function str2dbl($string) {
        $string = str_replace(',', '', $string);
        return (double)$string;
    }
}
