<?php

namespace App\Http\Controllers\Admin\Parameters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tproducts;
use App\Models\Insurers;
use Illuminate\Support\Facades\Gate;

class TproductsController extends Controller
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
        
        $datas = Tproducts::leftJoin('insurers', function($join){
            $join->on('tproducts.insurer_id', '=', 'insurers.id');
        })
        ->select('tproducts.*', 'insurers.name as insurername')
        ->get();;
        $insurances = Insurers::all();
        return view('admin.parameters.tproducts.index')
        ->with('datas', $datas)
        ->with('insurances', $insurances);;
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

        $tproduct = new Tproducts;
        $tproduct->insurer_id = $request->add_insurance;
        $tproduct->name = $request->add_name;
        $tproduct->abbreviation = $request->add_abbreviation;
        $tproduct->save();

        return redirect()->route('tproducts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

        $tproduct = Tproducts::find($id);
        $tproduct->insurer_id = $request->edit_insurance;
        $tproduct->name = $request->edit_name;
        $tproduct->abbreviation = $request->edit_abbreviation;
        $tproduct->save();
        return redirect()->route('tproducts.index');
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

        $tproduct = Tproducts::find($id);
        $tproduct->delete();
    }
}
