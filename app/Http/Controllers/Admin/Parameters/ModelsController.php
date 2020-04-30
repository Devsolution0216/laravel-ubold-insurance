<?php

namespace App\Http\Controllers\Admin\Parameters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Models;
use App\Models\Brands;
use App\Models\Products;
use App\Models\Uses;
use App\Models\Insurers;
use App\Models\Tproducts;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\URL;

class ModelsController extends Controller
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
        $datas = Models::leftJoin('brands', function($join){
            $join->on('models.brand_id', '=', 'brands.id');
        })
        ->select('models.*', 'brands.name as brandname')
        ->get();
        $types = Brands::all();
        return view('admin.parameters.models.index')->with('datas', $datas)->with('types', $types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        $model = new Models;
        $model->brand_id = $request->add_type;
        $model->name = $request->add_name;
        $model->market = $request->add_market;
        $model->year = $request->add_year;
        $model->save();

        return redirect()->route('models.index');
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

        $datas = Products::leftJoin('models', function($join){
            $join->on('products.model_id', '=', 'models.id');
        })
        ->leftJoin('uses', function($join){
            $join->on('products.use_id', '=', 'uses.id');
        })
        ->leftJoin('insurers', function($join){
            $join->on('products.insurer_id', '=', 'insurers.id');
        })
        ->leftJoin('tproducts', function($join){
            $join->on('products.tproduct_id', '=', 'tproducts.id');
        })
        ->where('products.model_id', '=', $id)
        ->select('products.*', 'models.name as modelname', 'uses.name as usename', 'insurers.name as insurername', 'tproducts.name as tproductname')
        ->get();

        $uses = Uses::all();
        $insurers = Insurers::all();
        $tproducts = Tproducts::all();
        $model = Models::find($id);
        return view('admin.parameters.models.product')
        ->with('datas', $datas)
        ->with('uses', $uses)
        ->with('insurers', $insurers)
        ->with('tproducts', $tproducts)
        ->with('model', $model);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

        $model = Models::find($id);
        $model->brand_id = $request->edit_type;
        $model->name = $request->edit_name;
        $model->market = $request->edit_market;
        $model->year = $request->edit_year;
        $model->save();
        return redirect()->route('models.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(500);
        }

        $model = Models::find($id);
        $model->delete();
    }

    public function productStore(Request $request) {
        if (! Gate::allows('users_manage')) {
            return abort(500);
        }

        $product = new Products;
        $product->model_id = $request->add_modelId;
        $product->use_id = $request->add_use;
        $product->insurer_id = $request->add_insurer;
        $product->tproduct_id = $request->add_tproduct;
        $product->save();
        return redirect()->route('models.show', $request->add_modelId);
    }

    public function productUpdate(Request $request, $id) {
        if (! Gate::allows('users_manage')) {
            return abort(500);
        }

        $product = Products::find($id);
        $product->use_id = $request->edit_use;
        $product->insurer_id = $request->edit_insurer;
        $product->tproduct_id = $request->edit_tproduct;
        $product->save();
        return redirect()->route('models.show', $request->edit_modelId);
    }

    public function productDestroy($id) {
        if (! Gate::allows('users_manage')) {
            return abort(500);
        }

        $product = Products::find($id);
        $product->delete();
    }
}
