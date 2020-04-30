@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}"><i class="ti-world"></i><span> @lang('menus.online quotation') </span></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('quotations.index') }}"><span> @lang('menus.quotation report') </span></a>
                        </li>
                        <li class="breadcrumb-item active">@lang('quotations.quotation show')</li>
                    </ol>
                </div>
                <h4 class="page-title">@lang('quotations.quotation show')</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="" style="margin-top: 25px; margin-left: 25px;">
            <a href="{{ route('quotations.index') }}"><i class="mdi mdi-arrow-left-drop-circle"></i> @lang('quotations.back to quotation report') </a>
        </div>
        <div class="card-body">
            <!-- form -->
            <form id="add_form" method="post" action="{{ route('quotations.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="insurer">@lang('quotations.type of insurers')</label>
                        <div class="col-md-9">
                            <input class="form-control" value="{{ $data->tinsurername }}" readonly="readonly" />
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="responsable">@lang('quotations.responsable')</label>
                        <div class="col-md-9">
                            <input class="form-control" value="{{ $data->responsable }}" readonly="readonly" />
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="brand">@lang('parameters.brand')</label>
                        <div class="col-md-9">
                            <input class="form-control" value="{{ $data->brandname }}" readonly="readonly" />
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="model">@lang('parameters.model')</label>
                        <div class="col-md-9">
                            <input class="form-control" value="{{ $data->modelname }}" readonly="readonly" />
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="year">@lang('parameters.year')*</label>
                        <div class="col-md-9">
                            <input class="form-control" value="{{ $data->year }}" readonly="readonly" />
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="use">@lang('quotations.type of use')</label>
                        <div class="col-md-9">
                            <input class="form-control" value="{{ $data->usename }}" readonly="readonly" />
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="marketValue">@lang('quotations.market value')</label>
                        <div class="col-md-9">
                            <input class="form-control autonumber" data-v-min="0" value="{{ $data->marketValue }}" readonly="readonly" />
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="civil">@lang('quotations.converted to gas')</label>
                        <div class="col-md-9">
                            <div class="radio radio-success form-check-inline">
                                @php $yCheck = "" @endphp
                                @php $nCheck = "" @endphp
                                @if ($data->boolGas == 1)
                                    @php $yCheck = "checked" @endphp
                                @else
                                    @php $nCheck = "checked" @endphp
                                @endif
                                <input type="radio" id="bookGas_yes" value="1" name="boolGas" {{ $yCheck }}  disabled>
                                <label for="bookGas_yes"> @lang('menus.yes') </label>
                            </div>
                            <div class="radio radio-danger form-check-inline">
                                <input type="radio" id="bookGas_no" value="0" name="boolGas" {{ $nCheck }} disabled>
                                <label for="bookGas_no"> @lang('menus.no') </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="prospect">@lang('quotations.prospect name')</label>
                        <div class="col-md-9">
                            <input class="form-control" value="{{ $data->prospect }}" readonly="readonly" />
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="age">@lang('quotations.age')</label>
                        <div class="col-md-9">
                            <input class="form-control" value="{{ $data->age }}" data-v-max="200" data-v-min="0" readonly="readonly" />
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="cellphone">@lang('quotations.cellphone')</label>
                        <div class="col-md-9">
                            <input class="form-control" value="{{ $data->cellphone }}" data-toggle="input-mask" data-mask-format="(000)-000-0000" maxlength="14" readonly="readonly" />
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="email">@lang('customers.email')</label>
                        <div class="col-md-9">
                            <input type="email" class="form-control" value="{{ $data->email }}" readonly="readonly"/>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="city">@lang('customers.city')</label>
                        <div class="col-md-9">
                            <input class="form-control" value="{{ $data->city }}" readonly="readonly" />
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="address">@lang('customers.address')</label>
                        <div class="col-md-9">
                            <input class="form-control" value="{{ $data->address }}" readonly="readonly" />
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="status">@lang('quotations.quotation status')</label>
                        <div class="col-md-9">
                            <input class="form-control" value="{{ $data->statusname }}" readonly="readonly" />
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="user">@lang('quotations.quotation issued by')</label>
                        <div class="col-md-9">
                            <input class="form-control" value="{{ $data->username }}" readonly="readonly" />
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="observaciones">@lang('quotations.observaciones')</label>
                        <div class="col-md-9">
                            <input class="form-control" value="{{ $data->observaciones }}" readonly="readonly" />
                        </div>
                    </div>
                    </div>
                </div>
            </form>
            @if ($data->result_html != '')
                <button id="savePDF" onclick="savePDF();" class="btn btn-danger btn-rounded mb-3"><i class="dripicons-export"></i> Download PDF</button>
            @endif
            <div id="result">
                {!! $data->result_html !!}
            </div>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        function savePDF() {
            const options = {
                margin: 1,
                filename: 'Quotation.pdf',
                image: { 
                    type: 'jpeg', 
                    quality: 0.98 
                },
                html2canvas: { 
                    scale: 2
                },
                jsPDF: { 
                    unit: 'cm', 
                    format: 'a3', 
                    orientation: 'landscape' 
                }
            }
            const element   = document.getElementById('result');
            html2pdf().from(element).set(options).save();
        }
    </script>
@endsection