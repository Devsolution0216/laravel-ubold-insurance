<?php

namespace App\Http\Controllers\Admin\Parameters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Escenaries;
use App\Models\Insurers;
use App\Models\Brands;
use App\Models\Tproducts;
use App\Models\Models;
use Illuminate\Support\Facades\Gate;

class EscenariesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('users_manage')) {
            return abort(500);
        }
        
        $datas = Escenaries::leftJoin('insurers', function($join){
            $join->on('escenaries.insurer_id', '=', 'insurers.id');
        })
        ->leftJoin('tproducts', function($join){
            $join->on('escenaries.tproduct_id', '=', 'tproducts.id');
        })
        ->leftJoin('brands', function($join){
            $join->on('escenaries.brand_id', '=', 'brands.id');
        })
        ->leftJoin('models', function($join){
            $join->on('escenaries.model_id', '=', 'models.id');
        })
        ->select('escenaries.*', 'insurers.name as insurername', 'tproducts.name as tproductname', 'brands.name as brandname', 'models.name as modelname')
        ->get();
        return view('admin.parameters.escenaries.index')->with('datas', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('users_manage')) {
            return abort(500);
        }

        $insurers = Insurers::all();
        $brands = Brands::all();
        return view('admin.parameters.escenaries.create')
        ->with('insurers', $insurers)
        ->with('brands', $brands);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Gate::allows('users_manage')) {
            return abort(500);
        }

        $escenaries = new Escenaries;
        $escenaries->insurer_id     = $request->insurer;
        $escenaries->tproduct_id    = $request->product;
        $escenaries->abbreviation   = $request->abbreviation;
        $escenaries->brand_id       = $request->brand;
        $escenaries->model_id       = $request->model;
        $escenaries->year           = $request->year;
        $escenaries->compressive    = $this->str2dbl($request->compressive);
        $escenaries->deductibles    = $request->deductibles;
        $escenaries->judicial       = $request->judicial;
        $escenaries->civil          = $request->civil;
        $escenaries->personal       = $request->personal;
        $escenaries->road           = $request->road;
        $escenaries->vehicle        = $request->vehicle;
        $escenaries->motor          = $request->motor;
        $escenaries->gasoline       = $this->str2dbl($request->gasoline);
        $escenaries->gas            = $this->str2dbl($request->gas);
        $escenaries->save();

        return redirect()->route('escenaries.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(500);
        }

        $data = Escenaries::leftJoin('insurers', function($join){
            $join->on('escenaries.insurer_id', '=', 'insurers.id');
        })
        ->leftJoin('tproducts', function($join){
            $join->on('escenaries.tproduct_id', '=', 'tproducts.id');
        })
        ->leftJoin('brands', function($join){
            $join->on('escenaries.brand_id', '=', 'brands.id');
        })
        ->leftJoin('models', function($join){
            $join->on('escenaries.model_id', '=', 'models.id');
        })
        ->select('escenaries.*', 'insurers.name as insurername', 'tproducts.name as tproductname', 'brands.name as brandname', 'models.name as modelname')
        ->find($id);

        return view('admin.parameters.escenaries.show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(500);
        }

        $data = Escenaries::find($id);
        $insurers = Insurers::all();
        $brands = Brands::all();
        return view('admin.parameters.escenaries.edit')
        ->with('data', $data)
        ->with('insurers', $insurers)
        ->with('brands', $brands);
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
        if (! Gate::allows('users_manage')) {
            return abort(500);
        }

        $escenaries = Escenaries::find($id);
        $escenaries->insurer_id     = $request->insurer;
        $escenaries->tproduct_id    = $request->product;
        $escenaries->abbreviation   = $request->abbreviation;
        $escenaries->brand_id       = $request->brand;
        $escenaries->model_id       = $request->model;
        $escenaries->year           = $request->year;
        $escenaries->compressive    = $this->str2dbl($request->compressive);
        $escenaries->deductibles    = $request->deductibles;
        $escenaries->judicial       = $request->judicial;
        $escenaries->civil          = $request->civil;
        $escenaries->personal       = $request->personal;
        $escenaries->road           = $request->road;
        $escenaries->vehicle        = $request->vehicle;
        $escenaries->motor          = $request->motor;
        $escenaries->gasoline       = $this->str2dbl($request->gasoline);
        $escenaries->gas            = $this->str2dbl($request->gas);
        $escenaries->save();

        return redirect()->route('escenaries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $escenaries = Escenaries::find($id);
        $escenaries->delete();
    }

    public function getProducts($id) {
        $products = Tproducts::where('insurer_id', '=', $id)->get();
        return $products;
    }

    public function getAbbreviation($id) {
        $abbreviation = Tproducts::find($id);
        return $abbreviation;
    }

    public function getModels($id) {
        $models = Models::where('brand_id', '=', $id)->get();
        return $models;
    }

    public function getYear($id) {
        $year = Models::find($id);
        return $year;
    }

    public function str2dbl($string) {
        $temp = str_replace(',', '', $string);
        return (double)$temp;
    }

    public function str2int($string) {
        $temp = str_replace(',', '', $string);
        return (int)$temp;
    }
}
