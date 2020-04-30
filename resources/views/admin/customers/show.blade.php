@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}"><i class="fe-users"></i><span> @lang('menus.customer') </span></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('customers.index') }}"><span> @lang('menus.customer report') </span></a>
                        </li>
                        <li class="breadcrumb-item active">@lang('customers.customer show')</li>
                    </ol>
                </div>
                <h4 class="page-title">@lang('customers.customer show')</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="" style="margin-top: 25px; margin-left: 25px;">
            <a href="{{ route('customers.index') }}"><i class="mdi mdi-arrow-left-drop-circle"></i> @lang('customers.back to customer') </a>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('customers.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="form-group row mb-3">
                            <h4>< @lang('customers.customer information') ></h4>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="person">@lang('customers.type of person')*</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="{{ $data->peoplename }}" readonly="readonly">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="first_last">@lang('customers.name and lastname')</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="{{ $data->first_last }}" readonly="readonly">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="document">@lang('customers.type of document')*</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="{{ $data->documentname }}" readonly="readonly">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="document_num">@lang('customers.document number')</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="{{ $data->document_num }}" readonly="readonly">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="attach_document">@lang('customers.attach document')</label>
                            <div class="col-md-9">
                                @if ($data->attach_document != '')
                                    <img src="/uploads/documents/{{ $data->attach_document }}" />
                                @else
                                    <img src="/assets/images/no_image.png" />
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="address">@lang('customers.address')</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="{{ $data->address }}" readonly="readonly">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="city">@lang('customers.city')</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="{{ $data->city }}" readonly="readonly">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="province">@lang('customers.provinces')*</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="{{ $data->provincename }}" readonly="readonly">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="telephone">@lang('customers.telephone number')</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="{{ $data->telephone }}" data-toggle="input-mask" data-mask-format="(000)-000-0000" maxlength="14" readonly="readonly">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="cellphone">@lang('customers.cell phone number')</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="{{ $data->cellphone }}" data-toggle="input-mask" data-mask-format="(000)-000-0000" maxlength="14" readonly="readonly">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="email">@lang('customers.email')</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="{{ $data->email }}" readonly="readonly">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="birth">@lang('customers.date of birth')</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="{{ $data->birth }}" readonly="readonly">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="profession">@lang('customers.occupational')*</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="{{ $data->professionname }}" readonly="readonly">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="economic">@lang('customers.economic activity')</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="{{ $data->economic }}" readonly="readonly">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="subagent">@lang('customers.subagents')*</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="{{ $data->subagentname }}" readonly="readonly">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <h4>< @lang('customers.contact person information') ></h4>
                        </div>
                        
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="contact_name">@lang('customers.name')</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="{{ $data->contact_name }}" readonly="readonly">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="contact_lastname">@lang('customers.lastname')</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="{{ $data->contact_lastname }}" readonly="readonly">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="contact_email">@lang('customers.email')</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="{{ $data->contact_email }}" readonly="readonly">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="contact_phone">@lang('customers.phone')</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="{{ $data->contact_phone }}" data-toggle="input-mask" data-mask-format="(000)-000-0000" maxlength="14" readonly="readonly">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section('javascript') 

@endsection