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
                        <li class="breadcrumb-item active">@lang('policies.edit policies')</li>
                    </ol>
                </div>
                <h4 class="page-title">@lang('policies.edit policies')</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form id="add_form" method="post" action="{{ URL::to('/policies/' . $data->id) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div id="rootwizard">
                    <ul class="nav nav-pills bg-light nav-justified form-wizard-header mb-3">
                        <li class="nav-item">
                            <a href="#information_car" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                <i class="fas fa-car"></i>
                                <span class="d-none d-sm-inline">@lang('policies.information car')</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#information_client" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                <i class="fas fa-user"></i>
                                <span class="d-none d-sm-inline">@lang('policies.information client')</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#information_insurance" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                <i class="fab fa-accusoft"></i>
                                <span class="d-none d-sm-inline">@lang('policies.information insurance')</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#information_quotation" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                <i class="fab fa-quora"></i>
                                <span class="d-none d-sm-inline">@lang('policies.information quotation')</span>
                            </a>
                        </li>
                    </ul>
                
                    <div class="tab-content b-0 mb-0">
                
                        <div id="bar" class="progress mb-3" style="height: 7px;">
                            <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-success"></div>
                        </div>
                
                        <div class="tab-pane" id="information_car">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group row mb-3">
                                        <label class="col-md-3 col-form-label" for="brand">@lang('parameters.brand')*</label>
                                        <div class="col-md-9">
                                            <select class="form-control" id="brand" name="brand" required>
                                                @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-md-3 col-form-label" for="model">@lang('parameters.model')</label>
                                        <div class="col-md-9">
                                            <select class="form-control" id="model" name="model" required>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-md-3 col-form-label" for="year">@lang('parameters.year')</label>
                                        <div class="col-md-9">
                                            <input type="text" id="year" name="year" class="form-control" value="" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-md-3 col-form-label" for="chassis">@lang('policies.chassis')</label>
                                        <div class="col-md-9">
                                            <input type="text" id="chassis" name="chassis" class="form-control" value="{{ $data->chassis }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-md-3 col-form-label" for="enrollment">@lang('policies.enrollment')</label>
                                        <div class="col-md-9">
                                            <input type="text" id="enrollment" name="enrollment" class="form-control" value="{{ $data->enrollment }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-md-3 col-form-label" for="color">@lang('policies.color')</label>
                                        <div class="col-md-9">
                                            <input type="text" id="color" name="color" class="form-control" value="{{ $data->color }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-md-3 col-form-label" for="circulation">@lang('policies.circulation zone')</label>
                                        <div class="col-md-9">
                                            <input type="text" id="circulation" name="circulation" class="form-control" value="{{ $data->circulation }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-md-3 col-form-label" for="fuel">@lang('policies.fuel type')</label>
                                        <div class="col-md-9">
                                            <select class="form-control" id="fuel" name="fuel" required>
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
                                            <input type="text" id="ndoor" name="ndoor" class="form-control" value="{{ $data->ndoor }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-md-3 col-form-label" for="use">@lang('policies.type of use')</label>
                                        <div class="col-md-9">
                                            <select class="form-control" id="use" name="use" required>
                                                @foreach ($uses as $use)
                                                <option value="{{ $use->id }}">{{ $use->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-md-3 col-form-label" for="condition">@lang('policies.condition')</label>
                                        <div class="col-md-9">
                                            <input type="text" id="condition" name="condition" class="form-control" value="{{ $data->condition }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-md-3 col-form-label" for="risk">@lang('policies.risk')</label>
                                        <div class="col-md-9">
                                            <input type="text" id="risk" name="risk" class="form-control" value="{{ $data->risk }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-md-3 col-form-label" for="passengers">@lang('policies.passengers')</label>
                                        <div class="col-md-9">
                                            <input type="text" id="passengers" name="passengers" class="form-control" value="{{ $data->passengers }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-md-3 col-form-label" for="cylinders">@lang('policies.cylinders')</label>
                                        <div class="col-md-9">
                                            <input type="text" id="cylinders" name="cylinders" class="form-control" value="{{ $data->cylinders }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-md-3 col-form-label" for="peso">@lang('policies.peso del vehiculo (toneladas)')</label>
                                        <div class="col-md-9">
                                            <input type="text" id="peso" name="peso" class="form-control" value="{{ $data->peso }}" required>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div>

                        <div class="tab-pane" id="information_client">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group row mb-3">
                                        <label class="col-md-3 col-form-label" for="customer">@lang('customers.name and lastname')</label>
                                        <div class="col-md-9">
                                            <select class="form-control" id="customer" name="customer" required>
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
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div>

                        <div class="tab-pane" id="information_insurance">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group row mb-3">
                                        <label class="col-md-3 col-form-label" for="insurer">@lang('policies.insurance company')</label>
                                        <div class="col-md-9">
                                            <select class="form-control" id="insurer" name="insurer" required>
                                                @foreach ($insurers as $insurer)
                                                <option value="{{ $insurer->id }}">{{ $insurer->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-md-3 col-form-label" for="tproduct">@lang('policies.list type of product')</label>
                                        <div class="col-md-9">
                                            <select class="form-control" id="tproduct" name="tproduct" required>
                                                
                                            </select>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div>

                        <div class="tab-pane" id="information_quotation">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group row mb-3">
                                        <label class="col-md-3 col-form-label" for="status">@lang('quotations.status')</label>
                                        <div class="col-md-9">
                                            <select class="form-control" id="statusoption" name="status" required>
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
                                            <input type="text" id="activation_date" name="activation_date" class="form-control" value="{{ $data->activation_date }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-md-3 col-form-label" for="star_date">@lang('policies.star date policy')</label>
                                        <div class="col-md-9">
                                            <input type="text" id="star_date" name="star_date" class="form-control" value="{{ $data->star_date }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-md-3 col-form-label" for="final_date">@lang('policies.final date policy')</label>
                                        <div class="col-md-9">
                                            <input type="text" id="final_date" name="final_date" class="form-control" value="{{ $data->final_date }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-md-3 col-form-label" for="policiesID">@lang('policies.policies id')</label>
                                        <div class="col-md-9">
                                            <input type="text" id="policiesID" name="policiesID" class="form-control" value="{{ $data->policies_id }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-md-3 col-form-label" for="external">@lang('policies.reference external')</label>
                                        <div class="col-md-9">
                                            <input type="text" id="external" name="external" class="form-control" value="{{ $data->external }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-md-3 col-form-label" for="internal">@lang('policies.reference internal')</label>
                                        <div class="col-md-9">
                                            <input type="text" id="internal" name="internal" class="form-control" value="{{ $data->internal }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-md-3 col-form-label" for="amount">@lang('policies.financing amount')</label>
                                        <div class="col-md-9">
                                            <input type="text" placeholder="" id="amount" name="amount" data-a-sign="$ " class="form-control autonumber" value="{{ $data->amount }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-md-3 col-form-label" for="marketValue">@lang('parameters.market value')</label>
                                        <div class="col-md-9">
                                            <input type="text" placeholder="" id="marketValue" name="marketValue" data-a-sign="$ " value="{{ $data->marketValue }}" class="form-control autonumber" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-md-3 col-form-label" for="annual">@lang('policies.premium total annual')</label>
                                        <div class="col-md-9">
                                            <input type="text" placeholder="" id="annual" name="annual" data-a-sign="$ " value="{{ $data->annual }}" class="form-control autonumber" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-md-3 col-form-label" for="net">@lang('policies.premium net')</label>
                                        <div class="col-md-9">
                                            <input type="text" placeholder="" id="net" name="net" data-a-sign="$ " value="{{ $data->net }}" class="form-control autonumber" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-md-3 col-form-label" for="month">@lang('policies.premium month')</label>
                                        <div class="col-md-9">
                                            <input type="text" placeholder="" id="month" name="month" data-a-sign="$ " value="{{ $data->month }}" class="form-control autonumber" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-md-3 col-form-label" for="isc">@lang('policies.isc (16.0%)')</label>
                                        <div class="col-md-9">
                                            <input type="text" placeholder="" id="isc" name="isc" data-a-sign="$ " value="{{ $data->isc }}" class="form-control autonumber" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-md-3 col-form-label" for="plan">@lang('policies.payment plan')</label>
                                        <div class="col-md-9">
                                            <input type="text" placeholder="" id="plan" name="plan" data-v-max="99999999" data-v-min="0" value="{{ $data->plan }}" class="form-control autonumber" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <div class="col-3">
                                        </div>
                                        <div class="col-9">
                                            <button type="submit" class="btn btn-block btn-primary waves-effect waves-light">@lange('customers.save change')</button>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div>

                        <ul class="list-inline mb-0 wizard">
                            <li class="previous list-inline-item">
                                <a href="javascript: void(0);" class="btn btn-secondary">@lang('policies.previous')</a>
                            </li>
                            <li class="next list-inline-item float-right">
                                <a href="javascript: void(0);" class="btn btn-secondary">@lang('policies.next')</a>
                            </li>
                        </ul>
                    </div> <!-- tab-content -->
                </div> <!-- end #progressbarwizard-->
            </form>
        </div>
    </div>
    <div class="row">
        
                                        
@stop

@section('javascript') 
    <script>
        $(document).ready(function(){
            init();

            $('#brand').change(function(){
                var id = $('#brand option:selected').val();
                getModels(id);
            });

            $('#model').change(function(){
                var id = $('#model option:selected').val();
                getYear(id);
            });

            $("#customer").change(function() {
                var id = $("#customer option:selected").val();
                getCustomer(id);
            });

            $("#insurer").change(function() {
                var id = $("#insurer option:selected").val();
                getTproducts(id);
            });

            //final date change
            $("#final_date").change(function() {
                var final_date = new Date($(this).val());
                var star_date = new Date($("#star_date").val());
                var cur_date = new Date($("#create_date").val());
                if (final_date <= star_date) {
                    $("#final_date").val('');
                    return false;
                }
                    
                // status setting...
                if (final_date > cur_date)
                    $("#statusoption").val(1);
                else
                    $("#statusoption").val(2);
            });

            //star date change
            $("#star_date").change(function() {
                var star_date = new Date($(this).val());
                var final_date = new Date($("#final_date").val());
                if (final_date <= star_date)
                    $("#star_date").val('');
            });

            var $validator = $("#add_form").validate({
                rules: {
                    emailfield: {
                        required: true,
                        email: true,
                        minlength: 3
                    },
                }
            });

            $('#rootwizard').bootstrapWizard({
                'tabClass': 'nav nav-pills',
                'onNext': function(tab, navigation, index) {
                    var $valid = $("#add_form").valid();
                    if (!$valid) {
                        $validator.focusInvalid();
                        return false;
                    }
                },
                'onTabClick': function(activeTab, navigation, currentIndex, nextIndex) {
                    if (nextIndex <= currentIndex) {
                        return;
                    }
                    var $valid = $("#add_form").valid();
                    if (!$valid) {
                        $validator.focusInvalid();
                        return false;
                    }
                    if (nextIndex > currentIndex+1){
                        return false;
                    }
                },
                onTabShow:function(t,r,a){
                    var o=(a+1)/r.find("li").length*100;
                    $("#rootwizard").find(".bar").css({width:o+"%"})
                }
            });
        });

        function init() {
            $("#activation_date").flatpickr();
            $("#star_date").flatpickr();
            $("#final_date").flatpickr();

            $("#fuel").val("{{ $data->fuel_id }}");
            $("#use").val("{{ $data->use_id }}");
            $("#statusoption").val("{{ $data->status_id }}");

            $("#brand").val("{{ $data->brand_id }}");
            var id = $('#brand option:selected').val();
            getModels(id);

            $("#customer").val("{{ $data->customer_id }}");
            id = $("#customer option:selected").val();
            getCustomer(id);

            $("#insurer").val("{{ $data->insurer_id }}");
            id = $("#insurer option:selected").val();
            getTproducts(id);
        }

        function getModels(id) {
            $.ajax({
                url: "/escenaries/getModels/" + id,
                type: 'get',
                dataType: 'json',
                success: function(data) {
                    var optionHtml = '';
                    $.each(data, function(key, value) {
                        optionHtml += '<option value="'+ value.id +'">'+ value.name +'</option>';
                    });
                    $('#model')
                    .empty()
                    .append(optionHtml);
                    $("select[id^='model']").change();
                }
            });
        }

        function getYear(id) {
            $.ajax({
                url: "/escenaries/getYear/" + id,
                type: 'get',
                dataType: 'json',
                success: function(data) {
                    $('#year').val(data['year']);
                }
            });
        }

        function getCustomer(id) {
            $.ajax({
                url: "/policies/getCustomer/" + id,
                type: 'get',
                dataType: 'json',
                success: function(data) {
                    $('#document').val(data['documentname']);
                    $('#document_num').val(data['document_num']);
                    if (data["attach_document"] != ''){
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

        function getTproducts(id) {
            $.ajax({
                url: "/policies/getTproducts/" + id,
                type: 'get',
                dataType: 'json',
                success: function(data) {
                    var optionHtml = '';
                    $.each(data, function(key, value) {
                        optionHtml += '<option value="'+ value.id +'">'+ value.name +'</option>';
                    });
                    $('#tproduct')
                    .empty()
                    .append(optionHtml);
                    $("select[id^='tproduct']").change();
                }
            });
        }
    </script>
@endsection