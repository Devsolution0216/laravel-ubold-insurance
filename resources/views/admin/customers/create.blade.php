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
                        <li class="breadcrumb-item active">@lang('menus.add new customer')</li>
                    </ol>
                </div>
                <h4 class="page-title">@lang('menus.add new customer')</h4>
            </div>
        </div>
    </div>
    <div class="card">
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
                                <select class="form-control" id="person" name="person" required>
                                    @foreach ($persons as $person)
                                        <option value="{{ $person->id }}">{{ $person->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="first_last">@lang('customers.name and lastname')</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="first_last" name="first_last">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="document">@lang('customers.type of document')*</label>
                            <div class="col-md-9">
                                <select class="form-control" id="document" name="document" required>
                                    @foreach ($documents as $document)
                                        <option value="{{ $document->id }}">{{ $document->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="document_num">@lang('customers.document number')</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control" id="document_num" name="document_num" min="0">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="attach_document">@lang('customers.attach document')</label>
                            <div class="col-md-9">
                                <input type="file" class="dropify" data-height="70" id="attach_document" name="attach_document"/>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="address">@lang('customers.address')</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="address" name="address">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="city">@lang('customers.city')</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="city" name="city">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="province">@lang('customers.provinces')*</label>
                            <div class="col-md-9">
                                <select class="form-control" id="province" name="province" required>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="telephone">@lang('customers.telephone number')</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="telephone" name="telephone" data-toggle="input-mask" data-mask-format="(000)-000-0000" maxlength="14">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="cellphone">@lang('customers.cell phone number')</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="cellphone" name="cellphone" data-toggle="input-mask" data-mask-format="(000)-000-0000" maxlength="14">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="email">@lang('customers.email')</label>
                            <div class="col-md-9">
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="birth">@lang('customers.date of birth')</label>
                            <div class="col-md-9">
                                <input type="text" id="basic-datepicker" name="birth" class="form-control" placeholder="">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="profession">@lang('customers.occupational')*</label>
                            <div class="col-md-9">
                                <select class="form-control" id="profession" name="profession" required>
                                    @foreach ($professions as $profession)
                                        <option value="{{ $profession->id }}">{{ $profession->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="economic">@lang('customers.economic activity')</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="economic" name="economic">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="subagent">@lang('customers.subagents')*</label>
                            <div class="col-md-9">
                                <select class="form-control" id="subagent" name="subagent" required>
                                    @foreach ($subagents as $subagent)
                                        <option value="{{ $subagent->id }}">{{ $subagent->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <h4>< @lang('customers.contact person information') ></h4>
                        </div>
                        
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="contact_name">@lang('customers.name')</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="contact_name" name="contact_name">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="contact_lastname">@lang('customers.lastname')</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="contact_lastname" name="contact_lastname">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="contact_email">@lang('customers.email')</label>
                            <div class="col-md-9">
                                <input type="email" class="form-control" id="contact_email" name="contact_email">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="contact_phone">@lang('customers.phone')</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="contact_phone" name="contact_phone" data-toggle="input-mask" data-mask-format="(000)-000-0000" maxlength="14">
                            </div>
                        </div>
                        <div class="form-group mb-0 justify-content-end row">
                            <div class="col-9">
                                <button type="submit" class="btn btn-block btn-primary waves-effect waves-light">@lang('menus.submit')</button>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>
            </form>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
		$(document).ready(function(){
            init();
        });
		
		function init() {
			$("#basic-datepicker").flatpickr();
		}
    </script>
@endsection