@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}"><i class="icon-rocket"></i><span> @lang('menus.quote parameters') </span></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('escenaries.index') }}"> @lang('menus.quote escenaries') </a>
                        </li>
                        <li class="breadcrumb-item active">@lang('parameters.quote escenaries create')</li>
                    </ol>
                </div>
                <h4 class="page-title">@lang('parameters.quote escenaries create')</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="" style="margin-top: 25px; margin-left: 25px;">
            <a href="{{ route('escenaries.index') }}"><i class="mdi mdi-arrow-left-drop-circle"></i> @lang('parameters.back to quote escenaries') </a>
        </div>
        <div class="card-body">
            <form id="add_form" method="post" action="{{ route('escenaries.store') }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="insurer">@lang('parameters.insurance company')*</label>
                        <div class="col-md-9">
                            <select class="form-control" id="insurer" name="insurer" required>
                                @foreach ($insurers as $insurer)
                                <option value="{{ $insurer->id }}">{{ $insurer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="product">@lang('parameters.product name')*</label>
                        <div class="col-md-9">
                            <select class="form-control" id="product" name="product" required>
                                
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="abbreviation">@lang('parameters.abbreviation')*</label>
                        <div class="col-md-9">
                            <input class="form-control" id="abbreviation" name="abbreviation" readonly="readonly" required />
                        </div>
                    </div>
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
                        <label class="col-md-3 col-form-label" for="model">@lang('parameters.model')*</label>
                        <div class="col-md-9">
                            <select class="form-control" id="model" name="model" required>
                                
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="year">@lang('parameters.year')*</label>
                        <div class="col-md-9">
                            <input class="form-control" id="year" name="year" readonly="readonly" required />
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="compressive">@lang('parameters.compressive risk')</label>
                        <div class="col-md-9">
                            <input data-a-sign="%" data-p-sign="s" class="form-control autonumber" id="compressive" name="compressive">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="deductibles">@lang('parameters.deductibles')</label>
                        <div class="col-md-9">
                            <input class="form-control" id="deductibles" name="deductibles" value="" />
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="judicial">@lang('parameters.judicial deposit')</label>
                        <div class="col-md-9">
                            <input class="form-control" id="judicial" name="judicial" value="" />
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="civil">@lang('parameters.civil liability')</label>
                        <div class="col-md-9">
                            <input class="form-control" id="civil" name="civil" value="" />
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="personal">@lang('parameters.personal accidents cond')</label>
                        <div class="col-md-9">
                            <input class="form-control" id="personal" name="personal" value="" />
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="road">@lang('parameters.road')</label>
                        <div class="col-md-9">
                            <input class="form-control" id="road" name="road" value="" />
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="vehicle">@lang('parameters.vehicle')</label>
                        <div class="col-md-9">
                            <input class="form-control" id="vehicle" name="vehicle" value="" />
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="motor">@lang('parameters.motor')</label>
                        <div class="col-md-9">
                            <input class="form-control" id="motor" name="motor" value="" />
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="gasoline">@lang('parameters.gasoline')</label>
                        <div class="col-md-9">
                            <input class="form-control autonumber" data-v-min="0" id="gasoline" name="gasoline" value="" />
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="gas">@lang('parameters.gas')</label>
                        <div class="col-md-9">
                            <input class="form-control autonumber" data-v-min="0" id="gas" name="gas" value="" />
                        </div>
                    </div>
                    <div class="form-group mb-0 justify-content-end row">
                        <div class="col-9">
                            <button type="submit" class="btn btn-block btn-primary waves-effect waves-light">@lang('menus.submit')</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        $(document).ready(function(){
            init();

            $("#insurer").change(function(){
                var id = $("#insurer option:selected").val();
                getProducts(id);
            });

            $('#product').change(function(){
                var id = $('#product option:selected').val();
                getAbbreviation(id);
            });

            $('#brand').change(function(){
                var id = $('#brand option:selected').val();
                getModels(id);
            });

            $('#model').change(function(){
                var id = $('#model option:selected').val();
                getYear(id);
            });
        });

        function init() {
            var id = $("#insurer option:selected").val();
            getProducts(id);

            id = $('#brand option:selected').val();
            getModels(id);
        }

        function getProducts(id) {
            $.ajax({
                url: "/escenaries/getProducts/" + id,
                type: 'get',
                dataType: 'json',
                success: function(data) {
                    var optionHtml = '';
                    $.each(data, function(key, value) {
                        optionHtml += '<option value="'+ value.id +'">'+ value.name +'</option>';
                    });
                    $('#product')
                    .empty()
                    .append(optionHtml);
                    $("select[id^='product']").change();
                }
            });
        }

        function getAbbreviation(id) {
            $.ajax({
                url: "/escenaries/getAbbreviation/" + id,
                type: 'get',
                dataType: 'json',
                success: function(data) {
                    $('#abbreviation').val(data['abbreviation']);
                }
            });
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
    </script>
@endsection