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
                        <li class="breadcrumb-item active">@lang('parameters.quote escenaries show')</li>
                    </ol>
                </div>
                <h4 class="page-title">@lang('parameters.quote escenaries show')</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="" style="margin-top: 25px; margin-left: 25px;">
            <a href="{{ route('escenaries.index') }}"><i class="mdi mdi-arrow-left-drop-circle"></i> @lang('parameters.back to quote escenaries') </a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                <div class="form-group row mb-3">
                    <label class="col-md-3 col-form-label" for="insurer">@lang('parameters.insurance company')</label>
                    <div class="col-md-9">
                        <input class="form-control" value="{{$data->insurername}}" readonly="readonly" />
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label class="col-md-3 col-form-label" for="product">@lang('parameters.product name')</label>
                    <div class="col-md-9">
                        <input class="form-control" value="{{$data->tproductname}}" readonly="readonly" />
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label class="col-md-3 col-form-label" for="abbreviation">@lang('parameters.abbreviation')*</label>
                    <div class="col-md-9">
                        <input class="form-control" value="{{$data->abbreviation}}" readonly="readonly" />
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label class="col-md-3 col-form-label" for="brand">@lang('parameters.brand')*</label>
                    <div class="col-md-9">
                        <input class="form-control" value="{{$data->brandname}}" readonly="readonly" />
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label class="col-md-3 col-form-label" for="model">@lang('parameters.model')*</label>
                    <div class="col-md-9">
                        <input class="form-control" value="{{$data->modelname}}" readonly="readonly" />
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label class="col-md-3 col-form-label" for="year">@lang('parameters.year')*</label>
                    <div class="col-md-9">
                        <input class="form-control" value="{{$data->year}}" readonly="readonly" />
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label class="col-md-3 col-form-label" for="compressive">@lang('parameters.compressive risk')</label>
                    <div class="col-md-9">
                        <input data-a-sign="%" data-p-sign="s" class="form-control autonumber" value="{{$data->compressive}}" readonly="readonly" />
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label class="col-md-3 col-form-label" for="deductibles">@lang('parameters.deductibles')</label>
                    <div class="col-md-9">
                        <input class="form-control" value="{{$data->deductibles}}" readonly="readonly" />
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label class="col-md-3 col-form-label" for="judicial">@lang('parameters.judicial deposit')</label>
                    <div class="col-md-9">
                        <input class="form-control" value="{{$data->judicial}}" readonly="readonly" />
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label class="col-md-3 col-form-label" for="civil">@lang('parameters.civil liability')</label>
                    <div class="col-md-9">
                        <input class="form-control" value="{{$data->civil}}" readonly="readonly" />
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label class="col-md-3 col-form-label" for="personal">@lang('parameters.personal accidents cond')</label>
                    <div class="col-md-9">
                        <input class="form-control" value="{{$data->personal}}" readonly="readonly" />
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label class="col-md-3 col-form-label" for="road">@lang('parameters.road')</label>
                    <div class="col-md-9">
                        <input class="form-control" value="{{$data->road}}" readonly="readonly" />
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label class="col-md-3 col-form-label" for="vehicle">@lang('parameters.vehicle')</label>
                    <div class="col-md-9">
                        <input class="form-control" value="{{$data->vehicle}}" readonly="readonly" />
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label class="col-md-3 col-form-label" for="motor">@lang('parameters.motor')</label>
                    <div class="col-md-9">
                        <input class="form-control" value="{{$data->motor}}" readonly="readonly" />
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label class="col-md-3 col-form-label" for="gasoline">@lang('parameters.gasoline')</label>
                    <div class="col-md-9">
                        <input class="form-control autonumber" data-v-min="1" value="{{$data->gasoline}}" readonly="readonly" />
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label class="col-md-3 col-form-label" for="gas">@lang('parameters.gas')</label>
                    <div class="col-md-9">
                        <input class="form-control autonumber" data-v-min="1" value="{{$data->gas}}" readonly="readonly" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
    
    </script>
@endsection