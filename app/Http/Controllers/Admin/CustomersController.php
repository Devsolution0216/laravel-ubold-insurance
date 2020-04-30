<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\Documents;
use App\Models\Peoples;
use App\Models\Provinces;
use App\Models\Professions;
use App\Models\Subagents;
use App\Models\Addpayments;
use File;

class CustomersController extends Controller
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

        $datas = Customers::all();
        return view('admin.customers.index')
        ->with('datas', $datas);
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

        $persons        = Peoples::all();
        $documents      = Documents::all();
        $provinces      = Provinces::all();
        $professions    = Professions::all();
        $subagents      = Subagents::all();

        return view('admin.customers.create')
        ->with('persons', $persons)
        ->with('documents', $documents)
        ->with('provinces', $provinces)
        ->with('professions', $professions)
        ->with('subagents', $subagents);
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
        if ($request->file('attach_document')){
            $extension = $request->file('attach_document')->extension();
            $cur_time = date("YmdHis");
            $filename = $cur_time .'.'. $extension;
            $request->file('attach_document')->move(public_path('/uploads/documents'), $filename);
        }

        $customer                   = new Customers;
        $customer->people_id        = $request->person;
        $customer->first_last       = $request->first_last;
        $customer->document_id      = $request->document;
        $customer->document_num     = $request->document_num;
        $customer->attach_document  = $filename;
        $customer->address          = $request->address;
        $customer->city             = $request->city;
        $customer->province_id      = $request->province;
        $customer->telephone        = $this->phone2dbl($request->telephone);
        $customer->cellphone        = $this->phone2dbl($request->cellphone);
        $customer->email            = $request->email;
        $customer->birth            = $request->birth;
        $customer->profession_id    = $request->profession;
        $customer->economic         = $request->economic;
        $customer->subagent_id      = $request->subagent;
        $customer->contact_name     = $request->contact_name;
        $customer->contact_lastname = $request->contact_lastname;
        $customer->contact_email    = $request->contact_email;
        $customer->contact_phone    = $this->phone2dbl($request->contact_phone);

        $customer->save();

        return redirect()->route('customers.create');
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

        $data = Customers::leftJoin('peoples', function($join){
            $join->on('customers.people_id', '=', 'peoples.id');
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
        ->select('customers.*', 'peoples.name as peoplename', 'documents.name as documentname', 'provinces.name as provincename', 'professions.name as professionname', 'subagents.name as subagentname')
        ->find($id);

        return view('admin.customers.show')
        ->with('data', $data);
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

        $persons        = Peoples::all();
        $documents      = Documents::all();
        $provinces      = Provinces::all();
        $professions    = Professions::all();
        $subagents      = Subagents::all();

        $data = Customers::leftJoin('peoples', function($join){
            $join->on('customers.people_id', '=', 'peoples.id');
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
        ->select('customers.*', 'peoples.name as peoplename', 'documents.name as documentname', 'provinces.name as provincename', 'professions.name as professionname', 'subagents.name as subagentname')
        ->find($id);

        return view('admin.customers.edit')
        ->with('data', $data)
        ->with('persons', $persons)
        ->with('documents', $documents)
        ->with('provinces', $provinces)
        ->with('professions', $professions)
        ->with('subagents', $subagents);
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

        $customer                   = Customers::find($id);
        $filename = '';
        if ($request->file('attach_document')){
            $old_filename = $customer->attach_document;
            File::delete(public_path('/uploads/documents').'/'.$old_filename);

            $extension = $request->file('attach_document')->extension();
            $cur_time = date("YmdHis");
            $filename = $cur_time .'.'. $extension;
            $request->file('attach_document')->move(public_path('/uploads/documents'), $filename);

            $customer->attach_document  = $filename;
        }

        $customer->people_id        = $request->person;
        $customer->first_last       = $request->first_last;
        $customer->document_id      = $request->document;
        $customer->document_num     = $request->document_num;
        $customer->address          = $request->address;
        $customer->city             = $request->city;
        $customer->province_id      = $request->province;
        $customer->telephone        = $this->phone2dbl($request->telephone);
        $customer->cellphone        = $this->phone2dbl($request->cellphone);
        $customer->email            = $request->email;
        $customer->birth            = $request->birth;
        $customer->profession_id    = $request->profession;
        $customer->economic         = $request->economic;
        $customer->subagent_id      = $request->subagent;
        $customer->contact_name     = $request->contact_name;
        $customer->contact_lastname = $request->contact_lastname;
        $customer->contact_email    = $request->contact_email;
        $customer->contact_phone    = $this->phone2dbl($request->contact_phone);

        $customer->save();

        return redirect()->route('customers.index');
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

        $customer = Customers::find($id);
        $old_filename = $customer->attach_document;
        $customer->delete();
        File::delete(public_path('/uploads/documents').'/'.$old_filename);
    }

    public function phone2dbl($string) {
        $string     = str_replace("(", "", $string);
        $string     = str_replace(")", "", $string);
        $string     = str_replace("-", "", $string);
        return (double)$string;
    }

    public function indexInquiry() {
        $datas = Addpayments::leftJoin('policies', function($join){
            $join->on('addpayments.policies_id', '=', 'policies.id');
        })
        ->select('addpayments.*', 'policies.policies_id as policiesID')
        ->get();
        return view('admin.customers.inquiry')
        ->with('datas', $datas);
    }

    public function excel() {
        $datas = Addpayments::leftJoin('policies', function($join){
            $join->on('addpayments.policies_id', '=', 'policies.id');
        })
        ->select('addpayments.*', 'policies.policies_id as policiesID')
        ->get();
        
        $html = '';
        $index = 1;
        foreach ($datas as $data) {
            $html .= '<tr>
                <td>'. $index .'</td>
                <td>'. $data->policiesID .'</td>
                <td>'. $data->tipo .'</td>
                <td>'. $data->aviso .'</td>
                <td>$ '. number_format($data->comercial, 2) .'</td>
                <td>$ '. number_format($data->neta, 2) .'</td>
                <td>$ '. number_format($data->total, 2) .'</td>
                <td>'. $data->concepto .'</td>
            </tr>';

            $index ++;
        }
        return $html;
    }
}
