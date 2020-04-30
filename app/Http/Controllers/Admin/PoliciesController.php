<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Policies;
use App\Models\Brands;
use App\Models\Uses;
use App\Models\Customers;
use App\Models\Insurers;
use App\Models\Pdocuments;
use App\Models\Pcomments;
use App\Models\Tproducts;
use App\Models\Pplans;
use App\Models\Addpayments;
use Illuminate\Http\Request;
use File;

class PoliciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $curDate = date('Y-m-d');
        $datas = Policies::getIndex($curDate);
        return view('admin.policies.index')
        ->with('datas', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brands::all();
        $uses = Uses::all();
        $customers = Customers::all();
        $insurers = Insurers::all();
        return view('admin.policies.create')
        ->with('brands', $brands)
        ->with('uses', $uses)
        ->with('customers', $customers)
        ->with('insurers', $insurers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $policy = new Policies;
        
        $policy->brand_id           = $request->brand;
        $policy->model_id           = $request->model;
        $policy->year               = $request->year;
        $policy->chassis            = $request->chassis;
        $policy->enrollment         = $request->enrollment;
        $policy->color              = $request->color;
        $policy->circulation        = $request->circulation;
        $policy->fuel_id            = $request->fuel;
        $policy->ndoor              = $request->ndoor;
        $policy->use_id             = $request->use;
        $policy->condition          = $request->condition;
        $policy->risk               = $request->risk;
        $policy->passengers         = $request->passengers;
        $policy->cylinders          = $request->cylinders;
        $policy->peso               = $request->peso;
        $policy->customer_id        = $request->customer;
        $policy->insurer_id         = $request->insurer;
        $policy->tproduct_id        = $request->tproduct;
        $policy->status_id          = $request->status;
        $policy->create_date        = $request->create_date;
        $policy->activation_date    = $request->activation_date;
        $policy->star_date          = $request->star_date;
        $policy->final_date         = $request->final_date;
        $policy->policies_id        = $request->policiesID;
        $policy->external           = $request->external;
        $policy->internal           = $request->internal;
        $policy->amount             = $this->amount2double($request->amount);
        $policy->marketValue        = $this->amount2double($request->marketValue);
        $policy->annual             = $this->amount2double($request->annual);
        $policy->net                = $this->amount2double($request->net);
        $policy->month              = $this->amount2double($request->month);
        $policy->isc                = $this->amount2double($request->isc);
        $policy->plan               = $this->str2int($request->plan);


        $policy->save();
        return redirect()->route('policies.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Policies::leftJoin('brands', function($join){
            $join->on('policies.brand_id', '=', 'brands.id');
        })
        ->leftJoin('models', function($join){
            $join->on('policies.model_id', '=', 'models.id');
        })
        ->leftJoin('uses', function($join){
            $join->on('policies.use_id', '=', 'uses.id');
        })
        ->leftJoin('insurers', function($join){
            $join->on('policies.insurer_id', '=', 'insurers.id');
        })
        ->leftJoin('tproducts', function($join){
            $join->on('policies.tproduct_id', '=', 'tproducts.id');
        })
        ->select('policies.*', 'brands.name as brandname', 'models.name as modelname', 'uses.name as usename', 'insurers.name as insurername', 'tproducts.name as tproductname')
        ->find($id);

        $customers = Customers::all();
        $pdocuments = Pdocuments::where('policies_id', '=', $id)->get();
        $pcomments = Pcomments::where('policies_id', '=', $id)->get();
        $pplans = Pplans::where('policies_id', '=', $id)->get();
        $addpayments = Addpayments::where('policies_id', '=', $id)->get();

        return view('admin.policies.show')
        ->with('data', $data)
        ->with('customers', $customers)
        ->with('pdocuments', $pdocuments)
        ->with('pcomments', $pcomments)
        ->with('pplans', $pplans)
        ->with('addpayments', $addpayments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Policies::find($id);

        $brands = Brands::all();
        $uses = Uses::all();
        $customers = Customers::all();
        $insurers = Insurers::all();

        return view('admin.policies.edit')
        ->with('data', $data)
        ->with('brands', $brands)
        ->with('uses', $uses)
        ->with('customers', $customers)
        ->with('insurers', $insurers);
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
        $policy = Policies::find($id);

        $policy->brand_id           = $request->brand;
        $policy->model_id           = $request->model;
        $policy->year               = $request->year;
        $policy->chassis            = $request->chassis;
        $policy->enrollment         = $request->enrollment;
        $policy->color              = $request->color;
        $policy->circulation        = $request->circulation;
        $policy->fuel_id            = $request->fuel;
        $policy->ndoor              = $request->ndoor;
        $policy->use_id             = $request->use;
        $policy->condition          = $request->condition;
        $policy->risk               = $request->risk;
        $policy->passengers         = $request->passengers;
        $policy->cylinders          = $request->cylinders;
        $policy->peso               = $request->peso;
        $policy->customer_id        = $request->customer;
        $policy->insurer_id         = $request->insurer;
        $policy->tproduct_id        = $request->tproduct;
        $policy->status_id          = $request->status;
        $policy->create_date        = $request->create_date;
        $policy->activation_date    = $request->activation_date;
        $policy->star_date          = $request->star_date;
        $policy->final_date         = $request->final_date;
        $policy->policies_id        = $request->policiesID;
        $policy->external           = $request->external;
        $policy->internal           = $request->internal;
        $policy->amount             = $this->amount2double($request->amount);
        $policy->marketValue        = $this->amount2double($request->marketValue);
        $policy->annual             = $this->amount2double($request->annual);
        $policy->net                = $this->amount2double($request->net);
        $policy->month              = $this->amount2double($request->month);
        $policy->isc                = $this->amount2double($request->isc);
        $policy->plan               = $this->str2int($request->plan);

        $policy->save();
        return redirect()->route('policies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $policy = Policies::find($id);
        $policy->delete();
    }

    public function getCustomer($id) {
        $customer = Customers::leftJoin('documents', function($join) {
            $join->on('customers.document_id', '=', 'documents.id');
        })
        ->leftJoin('provinces', function($join) {
            $join->on('customers.province_id', '=', 'provinces.id');
        })
        ->leftJoin('professions', function($join) {
            $join->on('customers.profession_id', '=', 'professions.id');
        })
        ->leftJoin('subagents', function($join) {
            $join->on('customers.subagent_id', '=', 'subagents.id');
        })
        ->select('customers.*', 'documents.name as documentname', 'provinces.name as provincename', 'professions.name as professionname', 'subagents.name as subagentname')
        ->find($id);
        return $customer;
    }

    public function getTproducts($id) {
        $tproducts = Tproducts::where('insurer_id', '=', $id)
        ->get();
        return $tproducts;
    }

    public function amount2double($string) {
        $string = str_replace("$", "", $string);
        $string = str_replace(" ", "", $string);
        $string = str_replace(",", "", $string);
        return (double)$string;
    }

    public function str2int($string) {
        $string = str_replace(",", "", $string);
        return (int)$string;
    }

    public function saveDocument(Request $request, $id) {
        $filename               = '';
        if ($request->file('document')){
            $extension          = $request->file('document')->extension();
            $cur_time           = date("YmdHis");
            $filename           = $cur_time .'.'. $extension;
            $request->file('document')->move(public_path('/uploads/policies'), $filename);
        }

        $pdocument              = new Pdocuments;
        $pdocument->policies_id = $id;
        $pdocument->name        = $filename;
        $pdocument->comments    = $request->comments;
        $pdocument->save();

        return redirect('policies/'.$id);
    }

    public function updateDocument(Request $request, $id, $pid) {
        $filename               = '';
        $pdocument              = Pdocuments::find($id);
        $old_filename           = $pdocument->name;

        if ($request->file('document')){
            $extension          = $request->file('document')->extension();
            $cur_time           = date("YmdHis");
            $filename           = $cur_time .'.'. $extension;
            $request->file('document')->move(public_path('/uploads/policies'), $filename);

            File::delete(public_path('/uploads/policies').'/'.$old_filename);
            $pdocument->name    = $filename;
        }

        $pdocument->comments    = $request->comments;
        $pdocument->save();

        return redirect('policies/'.$pid);
    }

    public function deleteDocument($id) {
        $pdocument              = Pdocuments::find($id);
        $old_filename           = $pdocument->name;
        File::delete(public_path('/uploads/policies').'/'.$old_filename);
        $pdocument->delete();
    }

    public function saveComments(Request $request, $id) {
        $pcomment               = new Pcomments;

        $curDate                = date('Y-m-d');
        $pcomment->policies_id  = $id;
        $pcomment->create_date  = $curDate;
        $pcomment->comments     = $request->comments;
        $pcomment->save();

        return redirect('policies/'.$id);
    }

    public function updateComment(Request $request, $id, $pid) {
        $pcomment               = Pcomments::find($id);
        $pcomment->comments     = $request->comments;
        $pcomment->save();

        return redirect('policies/'.$pid);
    }

    public function deleteComment($id) {
        $comment                = Pcomments::find($id);
        $comment->delete();
        
    }

    public function savePlan(Request $request, $id) {
        $pplan                  = new Pplans;
        $pplan->policies_id     = $id;
        $pplan->cuota_num       = $this->str2int($request->cuota_num);
        $pplan->coupon_num      = $this->str2int($request->coupon_num);
        $pplan->expiration_date = $request->expiration_date;
        $pplan->amount          = $this->amount2double($request->amount);
        $pplan->payment_date    = $request->payment_date;
        $pplan->bill            = $request->bill;
        $pplan->status_id       = $request->status;

        $pplan->save();
        return redirect('policies/'.$id);
    }

    public function updatePlan(Request $request, $id, $pid) {
        $pplan                  = Pplans::find($id);
        $pplan->cuota_num       = $this->str2int($request->cuota_num);
        $pplan->coupon_num      = $this->str2int($request->coupon_num);
        $pplan->expiration_date = $request->expiration_date;
        $pplan->amount          = $this->amount2double($request->amount);
        $pplan->payment_date    = $request->payment_date;
        $pplan->bill            = $request->bill;
        $pplan->status_id       = $request->status;

        $pplan->save();

        return redirect('policies/'.$pid);
    }

    public function deletePlan($id) {
        $pplan                  = Pplans::find($id);
        $pplan->delete();
    }

    public function savePayment(Request $request, $id) {
        $addpayment                 = new Addpayments;
        $addpayment->policies_id    = $id;
        $addpayment->tipo           = $request->tipo;
        $addpayment->aviso          = $request->aviso;
        $addpayment->comercial      = $this->amount2double($request->comercial);
        $addpayment->neta           = $this->amount2double($request->neta);
        $addpayment->total          = $this->amount2double($request->total);
        $addpayment->concepto       = $request->concepto;

        $addpayment->save();
        return redirect('policies/'.$id);
    }

    public function updatePayment(Request $request, $id, $pid) {
        $addpayment                 = Addpayments::find($id);
        $addpayment->tipo           = $request->tipo;
        $addpayment->aviso          = $request->aviso;
        $addpayment->comercial      = $this->amount2double($request->comercial);
        $addpayment->neta           = $this->amount2double($request->neta);
        $addpayment->total          = $this->amount2double($request->total);
        $addpayment->concepto       = $request->concepto;

        $addpayment->save();
        return redirect('policies/'.$pid);
    }

    public function deletePayment($id) {
        $addpayment                 = Addpayments::find($id);
        $addpayment->delete();
    }

    public function addpaymentExcel($id) {
        $datas = Addpayments::where('policies_id', '=', $id)->get();
        
        $html = '';
        $index = 1;
        foreach ($datas as $data) {
            $html .= '<tr>
                <td>'. $index .'</td>
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

    public function paymentplanExcel($id) {
        $datas = Pplans::where('policies_id', '=', $id)->get();
        
        $curDate = date('Y-m-d');
        $html = '';
        foreach ($datas as $data) {
            $status = '';
            $html .= '<tr>
                <td>'. $data->cuota_num .'</td>
                <td>'. $data->coupon_num .'</td>
                <td>'. $data->expiration_date .'</td>
                <td>$ '. number_format($data->amount, 2) .'</td>
                <td>'. $data->payment_date .'</td>
                <td>'. $data->bill .'</td>';

            if ($data->status_id == 2) {
                $status = __('policies.paid out');
            } else {
                if (date($data->expiration_date) > $curDate)
                    $status = __('policies.pending');
                else
                    $status = __('policies.expired');
            }
            $html .= '<td>'. $status .'</td></tr>';
        }
        return $html;
    }

    public function policiesExcel() {
        $datas = Policies::get_plicies_excel();
        
        $html = '';
        $index = 1;
        foreach ($datas as $data) {
            $fuel = '';
            $status = '';

            switch ($data->fuel_id) {
                case 1:
                    $fuel = __('policies.gasolina');
                    break;
                case 2:
                    $fuel = __('policies.gasoil');
                    break;
                case 3:
                    $fuel = __('policies.gas (glp)');
                    break;
                case 4:
                    $fuel = __('policies.gas (gnv)');
                    break;
            }

            switch ($data->status_id) {
                case 1:
                    $status = __('policies.vigente');
                    break;
                case 2:
                    $status = __('policies.expirated');
                    break;
                case 3:
                    $status = __('policies.renewed');
                    break;
                case 4:
                    $status = __('policies.withdrawn');
                    break;
            }

            $html .= '<tr>
                <td>'. $index .'</td>
                <td>'. $data->brandname .'</td>
                <td>'. $data->modelname .'</td>
                <td>'. $data->year .'</td>
                <td>'. $data->chassis .'</td>
                <td>'. $data->enrollment .'</td>
                <td>'. $data->color .'</td>
                <td>'. $data->circulation  .'</td>
                <td>'. $fuel .'</td>
                <td>'. $data->ndoor .'</td>
                <td>'. $data->usename .'</td>
                <td>'. $data->condition .'</td>
                <td>'. $data->risk .'</td>
                <td>'. $data->passengers .'</td>
                <td>'. $data->cylinders .'</td>
                <td>'. $data->peso .'</td>
                <td>'. $data->first_last .'</td>
                <td>'. $data->documentname .'</td>
                <td>'. $data->document_num .'</td>
                <td>'. $data->address .'</td>
                <td>'. $data->city .'</td>
                <td>'. $data->provincename .'</td>
                <td>'. $data->telephone .'</td>
                <td>'. $data->cellphone .'</td>
                <td>'. $data->email .'</td>
                <td>'. $data->birth .'</td>
                <td>'. $data->professionname .'</td>
                <td>'. $data->subagentname .'</td>
                <td>'. $data->insurername .'</td>
                <td>'. $data->tproductname .'</td>
                <td>'. $status .'</td>
                <td>'. $data->create_date .'</td>
                <td>'. $data->activation_date .'</td>
                <td>'. $data->star_date .'</td>
                <td>'. $data->final_date .'</td>
                <td>'. $data->policies_id .'</td>
                <td>'. $data->external .'</td>
                <td>'. $data->internal .'</td>
                <td>'. $data->amount .'</td>
                <td>'. $data->marketValue .'</td>
                <td>'. $data->annual .'</td>
                <td>'. $data->net .'</td>
                <td>'. $data->month .'</td>
                <td>'. $data->isc .'</td>
                <td>'. $data->plan .'</td>
            </tr>';

            $index ++;
        }
        return $html;
    }

    public function getSearch($type, $dates) {
        $datas = Policies::getSearch($type, $dates);
        return $datas;
    }
}
