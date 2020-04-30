<?php

namespace App\Http\Controllers\Admin\Parameters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Insurers;
use App\Models\Tinsurers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use File;

class InsurersController extends Controller
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

        $datas = Insurers::leftJoin('tinsurers', function($join){
                    $join->on('tinsurers.id', '=', 'insurers.type_id');
                })
                ->select('insurers.*', 'tinsurers.name as typename')
                ->get();
        $types = Tinsurers::all();
        return view('admin.parameters.insurers.index')->with('datas', $datas)->with('types', $types);
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
        $filename = '';
        if ($request->file('add_file')){
            $extension = $request->file('add_file')->extension();
            $cur_time = date("YmdHis");
            $filename = $cur_time .'.'. $extension;
            $request->file('add_file')->move(public_path('/uploads/logos'), $filename);
        }
        
        $insurer = new Insurers;
        $insurer->name = $request->add_name;
        $insurer->type_id = $request->add_type;
        $insurer->logo = $filename;
        $insurer->save();

        return redirect()->route('insurers.index');
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

        $insurer = Insurers::find($id);
        if ($request->file('edit_file')) {
            $old_filename = $insurer->logo;
            File::delete(public_path('/uploads/logos').'/'.$old_filename);

            $extension = $request->file('edit_file')->extension();
            $cur_time = date("YmdHis");
            $filename = $cur_time .'.'. $extension;
            $request->file('edit_file')->move(public_path('/uploads/logos'), $filename);

            $insurer->logo = $filename;
        }
        
        $insurer->name = $request->edit_name;
        $insurer->type_id = $request->edit_type;
        $insurer->save();
        
        return redirect()->route('insurers.index');
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

        $insurer = Insurers::find($id);
        $old_filename = $insurer->logo;
        $insurer->delete();
        File::delete(public_path('/uploads/logos').'/'.$old_filename);
    }
}
