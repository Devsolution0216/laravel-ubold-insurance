@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}"><i class="icon-note"></i><span> @lang('menus.policies portfolio') </span></a>
                        </li>
                        <li class="breadcrumb-item active">@lang('policies.show policies')</li>
                    </ol>
                </div>
                <h4 class="page-title">@lang('policies.show policies')</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div id="rootwizard">
                <ul class="nav nav-pills bg-light nav-justified form-wizard-header mb-3">
                    <li class="nav-item">
                        <a href="#information" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                            <i class="fas fa-info-circle"></i>
                            <span class="d-none d-sm-inline">@lang('policies.information')</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#documentation" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                            <i class="mdi mdi-file-document-outline"></i>
                            <span class="d-none d-sm-inline">@lang('policies.documentation')</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#observation" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                            <i class="mdi mdi-comment-eye"></i>
                            <span class="d-none d-sm-inline">@lang('policies.observation')</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#payment_plan" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                            <i class="fas fa-money-check-alt"></i>
                            <span class="d-none d-sm-inline">@lang('policies.payment plan')</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#add_payment" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                            <i class="fas fa-money-check"></i>
                            <span class="d-none d-sm-inline">@lang('policies.add payment')</span>
                        </a>
                    </li>
                </ul>
            
                <div class="tab-content b-0 mb-0">
            
                    <div class="tab-pane" id="information">
                        <div class="row">
                            <div class="col-12">
                                <h4>@lang('policies.information car')</h4>
                                <div class="dropdown-divider"></div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="brand">@lang('parameters.brand')</label>
                                    <div class="col-md-9">
                                        <input type="text" id="brand" name="brand" class="form-control" value="{{ $data->brandname }}" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="model">@lang('parameters.model')</label>
                                    <div class="col-md-9">
                                        <input type="text" id="model" name="model" class="form-control" value="{{ $data->modelname }}" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="year">@lang('parameters.year')</label>
                                    <div class="col-md-9">
                                        <input type="text" id="year" name="year" class="form-control" value="{{ $data->year }}" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="chassis">@lang('policies.chassis')</label>
                                    <div class="col-md-9">
                                        <input type="text" id="chassis" name="chassis" class="form-control" value="{{ $data->chassis }}" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="enrollment">@lang('policies.enrollment')</label>
                                    <div class="col-md-9">
                                        <input type="text" id="enrollment" name="enrollment" class="form-control" value="{{ $data->enrollment }}" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="color">@lang('policies.color')</label>
                                    <div class="col-md-9">
                                        <input type="text" id="color" name="color" class="form-control" value="{{ $data->color }}" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="circulation">@lang('policies.circulation zone')</label>
                                    <div class="col-md-9">
                                        <input type="text" id="circulation" name="circulation" class="form-control" value="{{ $data->circulation }}" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="fuel">@lang('policies.fuel type')</label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="fuel" name="fuel" disabled="true">
                                            <option value="1">@lang('policies.gasolina')</option>
                                            <option value="2">@lang('policies.gasoil')</option>
                                            <option value="3">@lang('policies.gas (glp)')</option>
                                            <option value="4">@lang('policies.gas (gnv)')</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="ndoor">@lang('policies.number of doors')</label>
                                    <div class="col-md-9">
                                        <input type="text" id="ndoor" name="ndoor" class="form-control" value="{{ $data->ndoor }}" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="use">@lang('policies.type of use')</label>
                                    <div class="col-md-9">
                                        <input type="text" id="use" name="use" class="form-control" value="{{ $data->usename }}" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="condition">@lang('policies.condition')</label>
                                    <div class="col-md-9">
                                        <input type="text" id="condition" name="condition" class="form-control" value="{{ $data->condition }}" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="risk">@lang('policies.risk')</label>
                                    <div class="col-md-9">
                                        <input type="text" id="risk" name="risk" class="form-control" value="{{ $data->risk }}" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="passengers">@lang('policies.passengers')</label>
                                    <div class="col-md-9">
                                        <input type="text" id="passengers" name="passengers" class="form-control" value="{{ $data->passengers }}" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="cylinders">@lang('policies.cylinders')</label>
                                    <div class="col-md-9">
                                        <input type="text" id="cylinders" name="cylinders" class="form-control" value="{{ $data->cylinders }}" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="peso">@lang('policies.peso del vehiculo (toneladas)')</label>
                                    <div class="col-md-9">
                                        <input type="text" id="peso" name="peso" class="form-control" value="{{ $data->peso }}" readonly="readonly">
                                    </div>
                                </div>
                                <h4>@lang('policies.information client')</h4>
                                <div class="dropdown-divider"></div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="customer">@lang('customers.name and lastname')</label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="customer" name="customer" disabled="true">
                                            @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->first_last }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="document">@lang('customers.type of document')</label>
                                    <div class="col-md-9">
                                        <input type="text" id="document" name="document" class="form-control" value="" readonly="readonly" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="document_num">@lang('customers.document number')</label>
                                    <div class="col-md-9">
                                        <input type="text" id="document_num" name="document_num" class="form-control" value="" readonly="readonly" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="attach_document">@lang('customers.attach document')</label>
                                    <div class="col-md-9">
                                        <img id="attach_document" name="attach_document" src="/assets/images/no_image.png" />
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="address">@lang('customers.address')</label>
                                    <div class="col-md-9">
                                        <input type="text" id="address" name="address" class="form-control" value="" readonly="readonly" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="city">@lang('customers.city')</label>
                                    <div class="col-md-9">
                                        <input type="text" id="city" name="city" class="form-control" value="" readonly="readonly" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="province">@lang('customers.provinces')</label>
                                    <div class="col-md-9">
                                        <input type="text" id="province" name="province" class="form-control" value="" readonly="readonly" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="telephone">@lang('customers.telephone number')</label>
                                    <div class="col-md-9">
                                        <input type="text" id="telephone" name="telephone" class="form-control" value="" readonly="readonly" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="cellphone">@lang('policies.cellphone number')</label>
                                    <div class="col-md-9">
                                        <input type="text" id="cellphone" name="cellphone" class="form-control" value="" readonly="readonly" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="email">@lang('customers.email')</label>
                                    <div class="col-md-9">
                                        <input type="email" id="email" name="email" class="form-control" value="" readonly="readonly" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="birth">@lang('customers.date of birth')</label>
                                    <div class="col-md-9">
                                        <input type="text" id="birth" name="birth" class="form-control" value="" readonly="readonly" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="ocuppational">@lang('policies.ocuppational')</label>
                                    <div class="col-md-9">
                                        <input type="text" id="ocuppational" name="ocuppational" class="form-control" value="" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="subagent">@lang('customers.subagents')</label>
                                    <div class="col-md-9">
                                        <input type="text" id="subagent" name="subagent" class="form-control" value="" readonly="readonly">
                                    </div>
                                </div>
                                <h4>@lang('policies.information insurance')</h4>
                                <div class="dropdown-divider"></div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="insurer">@lang('policies.insurance company')</label>
                                    <div class="col-md-9">
                                        <input type="text" id="insurer" name="insurer" class="form-control" value="{{ $data->insurername }}" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="tproduct">@lang('policies.list type of product')</label>
                                    <div class="col-md-9">
                                        <input type="text" id="tproduct" name="tproduct" class="form-control" value="{{ $data->tproductname }}" readonly="readonly">
                                    </div>
                                </div>
                                <h4>@lang('policies.information quotation')</h4>
                                <div class="dropdown-divider"></div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="status">@lang('quotations.status')</label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="pstatus" name="status" disabled="true">
                                            <option value="1">@lang('policies.vigente')</option>
                                            <option value="2">@lang('policies.expirated')</option>
                                            <option value="3">@lang('policies.renewed')</option>
                                            <option value="4">@lang('policies.withdrawn')</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="create_date">@lang('policies.created date')</label>
                                    <div class="col-md-9">
                                        <input type="text" id="create_date" name="create_date" class="form-control" value="{{ $data->create_date }}" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="activation_date">@lang('policies.activation date policy')</label>
                                    <div class="col-md-9">
                                        <input type="text" id="activation_date" name="activation_date" class="form-control" value="{{ $data->activation_date }}" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="star_date">@lang('policies.star date policy')</label>
                                    <div class="col-md-9">
                                        <input type="text" id="star_date" name="star_date" class="form-control" value="{{ $data->star_date }}" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="final_date">@lang('policies.final date policy')</label>
                                    <div class="col-md-9">
                                        <input type="text" id="final_date" name="final_date" class="form-control" value="{{ $data->final_date }}" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="policiesID">@lang('policies.policies id')</label>
                                    <div class="col-md-9">
                                        <input type="text" id="policiesID" name="policiesID" class="form-control" value="{{ $data->policies_id }}" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="external">@lang('policies.reference external')</label>
                                    <div class="col-md-9">
                                        <input type="text" id="external" name="external" class="form-control" value="{{ $data->external }}" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="internal">@lang('policies.reference internal')</label>
                                    <div class="col-md-9">
                                        <input type="text" id="internal" name="internal" class="form-control" value="{{ $data->internal }}" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="amount">@lang('policies.financing amount')</label>
                                    <div class="col-md-9">
                                        <input type="text" name="amount" data-a-sign="$ " class="form-control autonumber" value="{{ $data->amount }}" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="marketValue">@lang('parameters.market value')</label>
                                    <div class="col-md-9">
                                        <input type="text" placeholder="" id="marketValue" name="marketValue" data-a-sign="$ " class="form-control autonumber" value="{{ $data->marketValue }}" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="annual">@lang('policies.premium total annual')</label>
                                    <div class="col-md-9">
                                        <input type="text" placeholder="" id="annual" name="annual" data-a-sign="$ " class="form-control autonumber" value="{{ $data->annual }}" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="net">@lang('policies.premium net')</label>
                                    <div class="col-md-9">
                                        <input type="text" placeholder="" id="net" name="net" data-a-sign="$ " class="form-control autonumber" value="{{ $data->net }}" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="month">@lang('policies.premium month')</label>
                                    <div class="col-md-9">
                                        <input type="text" placeholder="" id="month" name="month" data-a-sign="$ " class="form-control autonumber" value="{{ $data->month }}" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="isc">@lang('policies.isc (16.0%)')</label>
                                    <div class="col-md-9">
                                        <input type="text" placeholder="" id="isc" name="isc" data-a-sign="$ " class="form-control autonumber" value="{{ $data->isc }}" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="plan">@lang('policies.payment plan')</label>
                                    <div class="col-md-9">
                                        <input type="text" placeholder="" id="plan" name="plan" data-v-max="99999999" data-v-min="0" class="form-control autonumber" value="{{ $data->plan }}" readonly="readonly">
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div>

                    <div class="tab-pane" id="documentation">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-sm-4">
                                    <button class="btn btn-success" data-toggle="modal" data-target="#add_modal"><i class="icon-plus"></i> @lang('menus.add') </button>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-top: 10px;">
                                <div class="responsive-table-plugin">
                                    <div class="table-rep-plugin">
                                        <div class="table-responsive">
                                            <table id="dataTable" class="table dt-responsive table-striped nowrap dataTable no-footer" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th> # </th>
                                                        <th>@lang('parameters.name')</th>
                                                        <th>@lang('policies.comments')</th>
                                                        <th>@lang('menus.action')</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $index = 0 @endphp
                                                    @foreach ($pdocuments as $pdocument)
                                                        @php $index ++ @endphp
                                                        <tr>
                                                            <td>{{ $index }}</td>
                                                            <td>{{ $pdocument->name }}</td>
                                                            <td>{{ $pdocument->comments }}</td>
                                                            <td>
                                                                <a href="{{ url('uploads/policies/' . $pdocument->name) }}" class="btn btn-success btn-xs dropdown-toggle" target="_blank"><i class="mdi mdi-eye"></i> @lang('menus.view')</a>
                                                                <a href="{{ url('uploads/policies/' . $pdocument->name) }}" class="btn btn-blue btn-xs waves-effect waves-light" download="{{ $pdocument->name }}"><i class="mdi mdi-file-pdf"></i> @lang('policies.download') </a>
                                                                <button type="button" class="btn btn-warning btn-xs waves-effect waves-light" onclick="editModal({{ $pdocument }}, {{ $data->id }})"><i class="mdi mdi-square-edit-outline"></i> @lang('menus.modify') </button>
                                                                <button type="button" class="btn btn-danger btn-xs waves-effect waves-light" onclick="del({{ $pdocument->id }}, {{ $data->id }})"><i class="mdi mdi-delete"></i> @lang('menus.delete') </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end row -->
                    </div>

                    <div class="tab-pane" id="observation">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-sm-4">
                                    <button class="btn btn-success" data-toggle="modal" data-target="#add_comments_modal"><i class="icon-plus"></i> @lang('menus.add') </button>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-top: 10px;">
                                <div class="responsive-table-plugin">
                                    <div class="table-rep-plugin">
                                        <div class="table-responsive">
                                            <table id="dataTable1" class="table dt-responsive table-striped nowrap dataTable no-footer" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th> # </th>
                                                        <th>@lang('policies.created date')</th>
                                                        <th>@lang('policies.comments')</th>
                                                        <th>@lang('menus.action')</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $index = 0 @endphp
                                                    @foreach ($pcomments as $pcomment)
                                                        @php $index ++ @endphp
                                                        <tr>
                                                            <td>{{ $index }}</td>
                                                            <td>{{ $pcomment->create_date }}</td>
                                                            <td>{{ $pcomment->comments }}</td>
                                                            <td>
                                                                <button type="button" class="btn btn-warning btn-xs waves-effect waves-light" onclick="edit_commentsModal({{ $pcomment }}, {{ $data->id }})"><i class="mdi mdi-square-edit-outline"></i> @lang('menus.modify') </button>
                                                                <button type="button" class="btn btn-danger btn-xs waves-effect waves-light" onclick="delComments({{ $pcomment->id }}, {{ $data->id }})"><i class="mdi mdi-delete"></i> @lang('menus.delete') </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div>

                    <div class="tab-pane" id="payment_plan">
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-success" data-toggle="modal" data-target="#add_pplan_modal"><i class="icon-plus"></i> @lang('menus.add') </button>
                            </div>
                            <div class="col-md-6" style="text-align: right;">
                                <button class="btn btn-primary waves-effect waves-light" onclick="paymentplanExcel({{ $data->id }});"><i class="mdi mdi-file-excel"> @lang('policies.export')</i></button>
                            </div>
                            <div class="col-md-12" style="margin-top: 10px;">
                                <div class="responsive-table-plugin">
                                    <div class="table-rep-plugin">
                                        <div class="table-responsive">
                                            <table id="dataTable2" class="table dt-responsive table-striped nowrap dataTable no-footer" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>@lang('policies.cuota no').</th>
                                                        <th>@lang('policies.coupon no').</th>
                                                        <th>@lang('policies.expiration date')</th>
                                                        <th>@lang('policies.amount')</th>
                                                        <th>@lang('policies.payment date')</th>
                                                        <th>@lang('policies.bill')</th>
                                                        <th>@lang('quotations.status')</th>
                                                        <th>@lang('menus.action')</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $curDate = date('Y-m-d') @endphp
                                                    @foreach ($pplans as $pplan)
                                                        <tr>
                                                            <td>{{ $pplan->cuota_num }}</td>
                                                            <td>{{ $pplan->coupon_num }}</td>
                                                            <td>{{ $pplan->expiration_date }}</td>
                                                            <td>$ {{ number_format($pplan->amount, 2) }}</td>
                                                            <td>{{ $pplan->payment_date }}</td>
                                                            <td>{{ $pplan->bill }}</td>
                                                            @if ($pplan->status_id == 2)
                                                                <td><span class="badge badge-info">@lang('policies.paid out')</span></td>
                                                            @else
                                                                @if (date($pplan->expiration_date) > $curDate)
                                                                    <td><span class="badge badge-success">@lang('policies.pending')</span></td>
                                                                @else
                                                                    <td><span class="badge badge-warning">@lang('policies.expired')</span></td>
                                                                @endif
                                                            @endif
                                                            <td>
                                                                <button type="button" class="btn btn-warning btn-xs waves-effect waves-light" onclick="edit_planModal({{ $pplan }}, {{ $data->id }})"><i class="mdi mdi-square-edit-outline"></i> @lang('menus.modify') </button>
                                                                <button type="button" class="btn btn-danger btn-xs waves-effect waves-light" onclick="delPlan({{ $pplan->id }}, {{ $data->id }})"><i class="mdi mdi-delete"></i> @lang('menus.delete') </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div>
                    <div class="tab-pane" id="add_payment">
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-success" data-toggle="modal" data-target="#add_addpayment_modal"><i class="icon-plus"></i> @lang('menus.add') </button>
                            </div>
                            <div class="col-md-6" style="text-align: right;">
                                <button class="btn btn-primary waves-effect waves-light" onclick="addpaymentExcel({{ $data->id }});"><i class="mdi mdi-file-excel"> @lang('policies.export')</i></button>
                            </div>
                            <div class="col-md-12" style="margin-top: 10px;">
                                <div class="responsive-table-plugin">
                                    <div class="table-rep-plugin">
                                        <div class="table-responsive">
                                            <table id="dataTable3" class="table dt-responsive table-striped nowrap dataTable no-footer" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>@lang('policies.tipo documento')</th>
                                                        <th>@lang('policies.aviso cobro')</th>
                                                        <th>@lang('policies.prima comercial')</th>
                                                        <th>@lang('policies.prima neta')</th>
                                                        <th>@lang('policies.prima total')</th>
                                                        <th>@lang('policies.concepto')</th>
                                                        <th>@lang('menus.action')</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $index = 0 @endphp
                                                    @foreach ($addpayments as $addpayment)
                                                        @php $index ++ @endphp
                                                        <tr>
                                                            <td>{{ $index }}</td>
                                                            <td>{{ $addpayment->tipo }}</td>
                                                            <td>{{ $addpayment->aviso }}</td>
                                                            <td>$ {{ number_format($addpayment->comercial, 2) }}</td>
                                                            <td>$ {{ number_format($addpayment->neta, 2) }}</td>
                                                            <td>$ {{ number_format($addpayment->total, 2) }}</td>
                                                            <td>{{ $addpayment->concepto }}</td>
                                                            <td>
                                                                <button type="button" class="btn btn-warning btn-xs waves-effect waves-light" onclick="edit_addpaymentModal({{ $addpayment }}, {{ $data->id }})"><i class="mdi mdi-square-edit-outline"></i> @lang('menus.modify') </button>
                                                                <button type="button" class="btn btn-danger btn-xs waves-effect waves-light" onclick="delAddpayment({{ $addpayment->id }}, {{ $data->id }})"><i class="mdi mdi-delete"></i> @lang('menus.delete') </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div>
                </div> <!-- tab-content -->
            </div> <!-- end #progressbarwizard-->
        </div>
    </div>

    <!-- Add Modal -->
    <div id="add_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="add_form" method="post" action="/policies/saveDocument/{{ $data->id }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <h4 class="modal-title">@lang('policies.add document')</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="form-group">
                            <label for="document" class="control-label">@lang('policies.document')</label>
                            <input type="file" class="dropify" data-height="70" id="document" name="document" accept="application/pdf"/ required>
                        </div>
                        <div class="form-group">
                            <label for="comments" class="control-label">@lang('policies.comments')*</label>
                            <textarea class="form-control" id="add_comments" name="comments" style="height: 150px;" value="" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">@lang('policies.close')</button>
                        <button type="submit" class="btn btn-info waves-effect waves-light">@lang('global.app_save')</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- Add Modal -->

    <!-- Edit Modal -->
    <div id="edit_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="edit_form" method="post" action="/policies/updateDocument/id/pid" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <h4 class="modal-title">@lang('policies.edit document')</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="form-group">
                            <label for="document" class="control-label">@lang('policies.document')</label>
                            <input type="file" class="dropify" data-height="70" id="document" name="document" accept="application/pdf"/>
                        </div>
                        <div class="form-group">
                            <label for="comments" class="control-label">@lang('policies.comments')*</label>
                            <textarea class="form-control" id="edit_comments" name="comments" style="height: 150px;" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">@lang('policies.close')</button>
                        <button type="submit" class="btn btn-info waves-effect waves-light">@lang('customers.save change')</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- Edit Modal -->

    <!-- Add Comments Modal -->
    <div id="add_comments_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="add_comments_form" method="post" action="/policies/saveComments/{{ $data->id }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <h4 class="modal-title">@lang('policies.add comments')</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="form-group">
                            <label for="comments" class="control-label">@lang('policies.comments')*</label>
                            <textarea class="form-control" id="add_observation_comments" name="comments" style="height: 150px;" value="" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">@lang('policies.close')</button>
                        <button type="submit" class="btn btn-info waves-effect waves-light">@lang('global.app_save')</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- Add Comments Modal -->

    <!-- Edit Comments Modal -->
    <div id="edit_comments_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="edit_comments_form" method="post" action="/policies/updateComments/id/pid" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <h4 class="modal-title">@lang('policies.edit comments')</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="form-group">
                            <label for="comments" class="control-label">@lang('policies.comments')*</label>
                            <textarea class="form-control" id="edit_observation_comments" name="comments" style="height: 150px;" value="" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">@lang('policies.close')</button>
                        <button type="submit" class="btn btn-info waves-effect waves-light">@lang('customers.save change')</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- Edit Comments Modal -->

    <!-- Add Payment Plan Modal -->
    <div id="add_pplan_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="add_pplan_form" method="post" action="/policies/savePlan/{{ $data->id }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <h4 class="modal-title">@lang('policies.add payment plan')</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="form-group">
                            <label for="cuota_num" class="control-label">@lang('policies.cuota no').*</label>
                            <input type="text" name="cuota_num" data-v-max="99999999" data-v-min="0" class="form-control autonumber" required />
                        </div>
                        <div class="form-group">
                            <label for="coupon_num" class="control-label">@lang('policies.coupon no').*</label>
                            <input type="text" name="coupon_num" data-v-max="99999999" data-v-min="0" class="form-control autonumber" required />
                        </div>
                        <div class="form-group">
                            <label for="expiration_date" class="control-label">@lang('policies.expiration date')*</label>
                            <input type="text" id="expiration_date" name="expiration_date" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label for="amount" class="control-label">@lang('policies.amount')*</label>
                            <input type="text" name="amount" data-a-sign="$ " class="form-control autonumber" required>
                        </div>
                        <div class="form-group">
                            <label for="payment_date" class="control-label">@lang('policies.payment date')*</label>
                            <input type="text" id="payment_date" name="payment_date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="bill" class="control-label">@lang('policies.bill')*</label>
                            <input type="text" name="bill" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="status" class="control-label">@lang('quotations.status')*</label>
                            <select class="form-control" name="status" required>
                                <option value="1">@lang('policies.pending')</option>
                                <option value="2">@lang('policies.paid out')</option>
                                <option value="3">@lang('policies.expired')</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">@lang('policies.close')</button>
                        <button type="submit" class="btn btn-info waves-effect waves-light">@lang('global.app_save')</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- Add Plan Modal -->

    <!-- Edit Payment Plan Modal -->
    <div id="edit_pplan_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="edit_pplan_form" method="post" action="/policies/editPlan/id/pid" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <h4 class="modal-title">@lang('policies.edit payment plan')</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="form-group">
                            <label for="cuota_num" class="control-label">@lang('policies.cuota no').*</label>
                            <input type="text" id="cuota_num" name="cuota_num" data-v-max="99999999" data-v-min="0" class="form-control autonumber" required />
                        </div>
                        <div class="form-group">
                            <label for="coupon_num" class="control-label">@lang('policies.coupon no').*</label>
                            <input type="text" id="coupon_num" name="coupon_num" data-v-max="99999999" data-v-min="0" class="form-control autonumber" required />
                        </div>
                        <div class="form-group">
                            <label for="expiration_date" class="control-label">@lang('policies.expiration date')*</label>
                            <input type="text" id="edit_expiration_date" name="expiration_date" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label for="amount" class="control-label">@lang('policies.amount')*</label>
                            <input type="text" id="amount" name="amount" data-a-sign="$ " class="form-control autonumber" required>
                        </div>
                        <div class="form-group">
                            <label for="payment_date" class="control-label">@lang('policies.payment date')*</label>
                            <input type="text" id="edit_payment_date" name="payment_date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="bill" class="control-label">@lang('policies.bill')*</label>
                            <input type="text" id="bill" name="bill" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="status" class="control-label">@lang('quotations.status')*</label>
                            <select class="form-control" id="statuses" name="status" required>
                                <option value="1">@lang('policies.pending')</option>
                                <option value="2">@lang('policies.paid out')</option>
                                <option value="3">@lang('policies.expired')</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">@lang('policies.close')</button>
                        <button type="submit" class="btn btn-info waves-effect waves-light">@lang('customers.save change')</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- Add Plan Modal -->

    <!-- Add Add Payment Modal -->
    <div id="add_addpayment_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="add_addpayment_form" method="post" action="/policies/savePayment/{{ $data->id }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <h4 class="modal-title">@lang('policies.add payment')</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="form-group">
                            <label for="tipo" class="control-label">@lang('policies.tipo documento')*</label>
                            <input type="text" name="tipo" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="aviso" class="control-label">@lang('policies.aviso cobro')*</label>
                            <input type="text" name="aviso" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="comercial" class="control-label">@lang('policies.prima comercial')*</label>
                            <input type="text" name="comercial" data-a-sign="$ " data-v-min="0" class="form-control autonumber" required />
                        </div>
                        <div class="form-group">
                            <label for="neta" class="control-label">@lang('policies.prima neta')*</label>
                            <input type="text" name="neta" data-a-sign="$ " data-v-min="0" class="form-control autonumber" required />
                        </div>
                        <div class="form-group">
                            <label for="total" class="control-label">@lang('policies.prima total')*</label>
                            <input type="text" name="total" data-a-sign="$ " data-v-min="0" class="form-control autonumber" required />
                        </div>
                        <div class="form-group">
                            <label for="concepto" class="control-label">@lang('policies.concepto')*</label>
                            <input type="text" name="concepto" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">@lang('policies.close')</button>
                        <button type="submit" class="btn btn-info waves-effect waves-light">@lang('global.app_save')</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- Add Add Payment Modal -->

    <!-- Edit Add Payment Modal -->
    <div id="edit_addpayment_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="edit_addpayment_form" method="post" action="/policies/updatePayment/id/pid" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <h4 class="modal-title">@lang('policies.edit payment')</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="form-group">
                            <label for="tipo" class="control-label">@lang('policies.tipo documento')*</label>
                            <input type="text" id="tipo" name="tipo" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="aviso" class="control-label">@lang('policies.aviso cobro')*</label>
                            <input type="text" id="aviso" name="aviso" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="comercial" class="control-label">@lang('policies.prima comercial')*</label>
                            <input type="text" id="comercial" name="comercial" data-a-sign="$ " data-v-min="0" class="form-control autonumber" required />
                        </div>
                        <div class="form-group">
                            <label for="neta" class="control-label">@lang('policies.prima neta')*</label>
                            <input type="text" id="neta" name="neta" data-a-sign="$ " data-v-min="0" class="form-control autonumber" required />
                        </div>
                        <div class="form-group">
                            <label for="total" class="control-label">@lang('policies.prima total')*</label>
                            <input type="text" id="total" name="total" data-a-sign="$ " data-v-min="0" class="form-control autonumber" required />
                        </div>
                        <div class="form-group">
                            <label for="concepto" class="control-label">@lang('policies.concepto')*</label>
                            <input type="text" id="concepto" name="concepto" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">@lang('policies.close')</button>
                        <button type="submit" class="btn btn-info waves-effect waves-light">@lang('customers.save change')</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- Edit Add Payment Modal -->
                                        
@stop

@section('javascript') 
    <script>
        $(document).ready(function(){
            init();

            $("#customer").change(function() {
                var id = $("#customer option:selected").val();
                getCustomer(id);
            });

            $('#rootwizard').bootstrapWizard({
                'tabClass': 'nav nav-pills',
                'onNext': function(tab, navigation, index) {

                },
                'onTabClick': function(activeTab, navigation, currentIndex, nextIndex) {

                }
            });

            $('#dataTable1').DataTable({
                language:{
                    paginate:{
                        previous:"<i class='mdi mdi-chevron-left'>",next:"<i class='mdi mdi-chevron-right'>"
                    }
                },drawCallback:function(){
                    $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
                }
            });

            $('#dataTable2').DataTable({
                language:{
                    paginate:{
                        previous:"<i class='mdi mdi-chevron-left'>",next:"<i class='mdi mdi-chevron-right'>"
                    }
                },drawCallback:function(){
                    $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
                }
            });

            $('#dataTable3').DataTable({
                language:{
                    paginate:{
                        previous:"<i class='mdi mdi-chevron-left'>",next:"<i class='mdi mdi-chevron-right'>"
                    }
                },drawCallback:function(){
                    $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
                }
            });
        });

        function init() {
            $("#expiration_date").flatpickr();
            $("#payment_date").flatpickr();
            $("#edit_expiration_date").flatpickr();
            $("#edit_payment_date").flatpickr();

            $("#fuel").val("{{ $data->fuel_id }}");
            $("#customer").val("{{ $data->customer_id }}");
            $("#pstatus").val("{{ $data->status_id }}");
            id = $("#customer option:selected").val();
            getCustomer(id);
        }

        function getCustomer(id) {
            $.ajax({
                url: "/policies/getCustomer/" + id,
                type: 'get',
                dataType: 'json',
                success: function(data) {
                    $('#document').val(data['documentname']);
                    $('#document_num').val(data['document_num']);
                    if (data["attach_document"] != '') {
                        $("#attach_document").attr("src", "/uploads/documents/"+data["attach_document"]);
                    }
                    $('#address').val(data['address']);
                    $('#city').val(data['city']);
                    $('#province').val(data['provincename']);
                    $('#telephone').val(data['telephone']);
                    $('#cellphone').val(data['cellphone']);
                    $('#email').val(data['email']);
                    $('#birth').val(data['birth']);
                    $('#ocuppational').val(data['professionname']);
                    $('#subagent').val(data['subagentname']);
                    $('#document').val(data['documentname']);
                    $('#document').val(data['documentname']);
                }
            });
        }

        function editModal(pdocument, pid) {
            $('#edit_comments').val(pdocument['comments']);
            $('#edit_form').attr('action', '/policies/updateDocument/'+pdocument['id']+'/'+pid);
            $('#edit_modal').modal('show');
        }

        function del(id, pid) {
            swal({
                title:"Are you sure?",
                text:"You won't be able to revert this!",
                type:"warning",
                showCancelButton:!0,
                confirmButtonClass:"btn btn-confirm mt-2",
                cancelButtonClass:"btn btn-cancel ml-2 mt-2",
                confirmButtonText:"Yes, delete it!"
            }).then(function(e) {
                if (e.value) {
                    $.ajax({
                        url: "/policies/deleteDocument/" + id,
                        type: 'post',
                        dataType: 'text',
                        success: function(data) {
                            window.location="/policies/"+pid;
                        }
                    });
                }
            });
        }

        function edit_commentsModal(pcomment, pid) {
            $('#edit_observation_comments').val(pcomment['comments']);
            $('#edit_comments_form').attr('action', '/policies/updateComment/'+pcomment['id']+'/'+pid);
            $('#edit_comments_modal').modal('show');
        }

        function delComments(id, pid) {
            swal({
                title:"Are you sure?",
                text:"You won't be able to revert this!",
                type:"warning",
                showCancelButton:!0,
                confirmButtonClass:"btn btn-confirm mt-2",
                cancelButtonClass:"btn btn-cancel ml-2 mt-2",
                confirmButtonText:"Yes, delete it!"
            }).then(function(e) {
                if (e.value) {
                    $.ajax({
                        url: "/policies/deleteComment/" + id,
                        type: 'post',
                        dataType: 'text',
                        success: function(data) {
                            window.location="/policies/"+pid;
                        }
                    });
                }
            });
        }

        function edit_planModal(pplan, pid) {
            $('#cuota_num').val(pplan['cuota_num']);
            $('#coupon_num').val(pplan['coupon_num']);
            $('#edit_expiration_date').val(pplan['expiration_date']);
            $('#amount').val(pplan['amount']);
            $('#edit_payment_date').val(pplan['payment_date']);
            $('#cuota_num').val(pplan['cuota_num']);
            $('#bill').val(pplan['bill']);
            $("#statuses").val(pplan['status_id']);

            $('#edit_pplan_form').attr('action', '/policies/updatePlan/'+pplan['id']+'/'+pid);
            $('#edit_pplan_modal').modal('show');
        }

        function delPlan(id, pid) {
            swal({
                title:"Are you sure?",
                text:"You won't be able to revert this!",
                type:"warning",
                showCancelButton:!0,
                confirmButtonClass:"btn btn-confirm mt-2",
                cancelButtonClass:"btn btn-cancel ml-2 mt-2",
                confirmButtonText:"Yes, delete it!"
            }).then(function(e) {
                if (e.value) {
                    $.ajax({
                        url: "/policies/deletePlan/" + id,
                        type: 'post',
                        dataType: 'text',
                        success: function(data) {
                            window.location="/policies/"+pid;
                        }
                    });
                }
            });
        }

        function edit_addpaymentModal(addpayment, pid) {
            $('#tipo').val(addpayment['tipo']);
            $('#aviso').val(addpayment['aviso']);
            $('#comercial').val(addpayment['comercial']);
            $('#neta').val(addpayment['neta']);
            $('#total').val(addpayment['total']);
            $('#concepto').val(addpayment['concepto']);

            $('#edit_addpayment_form').attr('action', '/policies/updatePayment/'+addpayment['id']+'/'+pid);
            $('#edit_addpayment_modal').modal('show');
        }

        function delAddpayment(id, pid) {
            swal({
                title:"Are you sure?",
                text:"You won't be able to revert this!",
                type:"warning",
                showCancelButton:!0,
                confirmButtonClass:"btn btn-confirm mt-2",
                cancelButtonClass:"btn btn-cancel ml-2 mt-2",
                confirmButtonText:"Yes, delete it!"
            }).then(function(e) {
                if (e.value) {
                    $.ajax({
                        url: "/policies/deletePayment/" + id,
                        type: 'post',
                        dataType: 'text',
                        success: function(data) {
                            window.location="/policies/"+pid;
                        }
                    });
                }
            });
        }

        function addpaymentExcel(id) {
            var htmls = "";
            var uri = 'data:application/vnd.ms-excel;base64,';
            var template = '<table> \
                <tr> \
                    <td><span style="font-weight:bold">#</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('policies.tipo documento')) +'</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('policies.aviso cobro')) +'</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('policies.prima comercial')) +'</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('policies.prima neta')) +'</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('policies.prima total')) +'</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('policies.concepto')) +'</span></td> \
                </tr>';

            var base64 = function(s) {
                return window.btoa(unescape(encodeURIComponent(s)))
            };
            var format = function(s, c) {
                return s.replace(/{(\w+)}/g, function(m, p) {
                    return c[p];
                })
            };

            htmls = "YOUR HTML AS TABLE"

            var ctx = {
                worksheet : 'Worksheet',
                table : htmls
            }

            $.ajax({
                url: "/policies/addpaymentExcel/" + id,
                type: 'get',
                dataType: 'text',
                success: function(data) {
                    template += data + '</table>';

                    var link = document.createElement("a");
                    link.download = "Add Payment.xls";
                    link.href = uri + base64(format(template, ctx));
                    link.click();
                }
            });
        }

        function paymentplanExcel(id) {
            var htmls = "";
            var uri = 'data:application/vnd.ms-excel;base64,';
            var template = '<table> \
                <tr> \
                    <td><span style="font-weight:bold">'+ @json(__('policies.cuota no')) +'.</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('policies.coupon no')) +'.</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('policies.expiration date')) +'</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('policies.amount')) +'</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('policies.payment date')) +'</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('policies.bill')) +'</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('quotations.status')) +'</span></td> \
                </tr>';

            var base64 = function(s) {
                return window.btoa(unescape(encodeURIComponent(s)))
            };
            var format = function(s, c) {
                return s.replace(/{(\w+)}/g, function(m, p) {
                    return c[p];
                })
            };

            htmls = "YOUR HTML AS TABLE"

            var ctx = {
                worksheet : 'Worksheet',
                table : htmls
            }

            $.ajax({
                url: "/policies/paymentplanExcel/" + id,
                type: 'get',
                dataType: 'text',
                success: function(data) {
                    template += data + '</table>';

                    var link = document.createElement("a");
                    link.download = "Payment Plan.xls";
                    link.href = uri + base64(format(template, ctx));
                    link.click();
                }
            });
        }
    </script>
@endsection