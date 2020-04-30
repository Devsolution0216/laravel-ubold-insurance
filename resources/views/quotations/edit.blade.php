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
                        <li class="breadcrumb-item active">@lang('quotations.quotation modify')</li>
                    </ol>
                </div>
                <h4 class="page-title">@lang('quotations.quotation modify')</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="" style="margin-top: 30px; margin-left: 25px;">
            <a href="{{ route('quotations.index') }}"><i class="mdi mdi-arrow-left-drop-circle"></i> @lang('quotations.back to quotation report') </a>
        </div>
        <div class="card-body">
            <!-- form -->
            <form id="edit_form" method="post" action="{{ URL::to('/quotations/' . $data->id) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="insurer">@lang('quotations.type of insurers')*</label>
                        <div class="col-md-9">
                            <select class="form-control" id="insurer" name="insurer" required>
                                @foreach ($tinsurers as $tinsurer)
                                <option value="{{ $tinsurer->id }}">{{ $tinsurer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="responsable">@lang('quotations.responsable')*</label>
                        <div class="col-md-9">
                            <input class="form-control" id="responsable" name="responsable" value="{{ $data->responsable }}" required />
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
                        <label class="col-md-3 col-form-label" for="use">@lang('quotations.type of use')</label>
                        <div class="col-md-9">
                            <select class="form-control" id="use" name="use" required>
                                @foreach ($uses as $use)
                                <option value="{{ $use->id }}">{{ $use->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="marketValue">@lang('quotations.market value')</label>
                        <div class="col-md-9">
                            <input class="form-control autonumber" data-v-min="0" id="marketValue" name="marketValue" value="{{ $data->marketValue }}" />
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
                                <input type="radio" id="bookGas_yes" value="1" name="boolGas" {{ $yCheck }}>
                                <label for="bookGas_yes"> @lang('menus.yes') </label>
                            </div>
                            <div class="radio radio-danger form-check-inline">
                                <input type="radio" id="bookGas_no" value="0" name="boolGas" {{ $nCheck }}>
                                <label for="bookGas_no"> @lang('menus.no') </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="prospect">@lang('quotations.prospect name')</label>
                        <div class="col-md-9">
                            <input class="form-control" id="prospect" name="prospect" value="{{ $data->prospect }}" />
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="age">@lang('quotations.age')</label>
                        <div class="col-md-9">
                            <input class="form-control autonumber" data-v-max="200" data-v-min="0" id="age" name="age" value="{{ $data->age }}" />
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="cellphone">@lang('quotations.cellphone')</label>
                        <div class="col-md-9">
                            <input class="form-control" id="cellphone" name="cellphone" value="{{ $data->cellphone }}" data-toggle="input-mask" data-mask-format="(000)-000-0000" maxlength="14"/>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="email">@lang('customers.email')</label>
                        <div class="col-md-9">
                            <input type="email" class="form-control" id="email" name="email" value="{{ $data->email }}" />
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="city">@lang('customers.city')</label>
                        <div class="col-md-9">
                            <input class="form-control" id="city" name="city" value="{{ $data->city }}" />
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="address">@lang('customers.address')</label>
                        <div class="col-md-9">
                            <input class="form-control" id="address" name="address" value="{{ $data->address }}" />
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="status">@lang('quotations.quotation status')</label>
                        <div class="col-md-9">
                            <select class="form-control" name="status" required>
                                @foreach ($statuses as $status)
                                <option value="{{ $status->id }}">{{ $status->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="user">@lang('quotations.quotation issued by')</label>
                        <div class="col-md-9">
                            <input class="form-control" id="user" name="user" value="{{ $data->username }}" readonly="readonly" />
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="observaciones">@lang('quotations.observaciones')</label>
                        <div class="col-md-9">
                            <input class="form-control" id="observaciones" name="observaciones" value="{{ $data->observaciones }}" />
                        </div>
                    </div>
                    <div class="form-group mb-0 justify-content-end row">
                        <div class="col-9">
                            <button type="submit" class="ladda-button btn btn-block btn-primary waves-effect waves-light" data-style="zoom-in">Update and Matched Data</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card-box">
        <!-- result table -->
        <div class="responsive-table-plugin">
            <div class="table-rep-plugin">
                <div class="table-responsive">
                    <table id="resultTable" class="table dt-responsive table-striped nowrap">
                        <thead> 
                            <th>#</th>
                            <th>Logo</th>
                            <th>Insurance Company</th>
                            <th>Product Name</th>
                            <th>Product Abbreviation</th>
                            <th>Compressive Risk</th>
                            <th>Deductibles (Own Damage/Crystal)</th>
                            <th>Judicial Deposit</th>
                            <th>Civil</th>
                            <th>Personal Accidents Cond</th>
                            <th>Road Assistance (Light Vehicles Only)</th>
                            <th>Vehicles Rental (Light Vehicles Only)</th>
                            <th>Motor Center</th>
                            <th>Premium Month</th>
                        </thead>
                        <tbody>
                        @php $index = 0 @endphp
                        @foreach ($matchdatas as $matchdata)
                            @php $index ++ @endphp
                            @if ($data->boolGas == 1)
                                @php $premium = $data->marketValue / 100 * $matchdata->gas @endphp
                            @else
                                @php $premium = $data->marketValue / 100 * $matchdata->gasoline @endphp
                            @endif
                            <tr>
                                <td>{{ $index }}</td>
                                <td><img src="/uploads/logos/{{ $matchdata->logo }}" height="40"></td>
                                <td>{{ $matchdata->insurername }}</td>
                                <td>{{ $matchdata->tproductname }}</td>
                                <td>{{ $matchdata->abbreviation }}</td>
                                <td>{{ number_format($matchdata->compressive) }}%</td>
                                <td>{{ $matchdata->deductibles }}</td>
                                <td>{{ $matchdata->judicial }}</td>
                                <td>{{ $matchdata->civil }}</td>
                                <td>{{ $matchdata->personal }}</td>
                                <td>{{ $matchdata->road }}</td>
                                <td>{{ $matchdata->vehicle }}</td>
                                <td>{{ $matchdata->motor }}</td>
                                <td>${{ number_format($premium) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        // Loading button
        Ladda.bind(".ladda-button")
        var noMatch = ' \
            <div class="alert alert-warning alert-dismissible bg-warning text-white border-0 fade show" role="alert"> \
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> \
                    <span aria-hidden="true">×</span> \
                </button> \
                <center>That has nothing result</center> \
            </div>';
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

            // form submit
            $("#edit_form").submit(function(e) {
                e.preventDefault(); // avoid to execute the actual submit of the form.

                var resultTable = '';
                var form = $(this);
                var url = form.attr('action');
                
                $.ajax({
                    type: "POST",
                    url: url,
                    data: form.serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        Ladda.stopAll()
                        if (data == 'No Match') {
                           $("#resultTable").html(noMatch);
                        } else {
                            // Table Configuration
                            resultTable = " \
                            <thead> \
                                <th>#</th> \
                                <th>"+ @json(__('parameters.logo')) +"</th> \
                                <th>"+ @json(__('parameters.insurance company')) +"</th> \
                                <th>"+ @json(__('parameters.product name')) +"</th> \
                                <th>"+ @json(__('quotations.product abbreviation')) +"</th> \
                                <th>"+ @json(__('parameters.compressive risk')) +"</th> \
                                <th>"+ @json(__('parameters.deductibles')) +"</th> \
                                <th>"+ @json(__('parameters.judicial deposit')) +"</th> \
                                <th>"+ @json(__('quotations.civil')) +"</th> \
                                <th>"+ @json(__('parameters.personal accidents cond')) +"</th> \
                                <th>"+ @json(__('parameters.road')) +"</th> \
                                <th>"+ @json(__('parameters.vehicle')) +"</th> \
                                <th>"+ @json(__('parameters.motor')) +"</th> \
                                <th>"+ @json(__('policies.premium month')) +"</th> \
                            </thead> \
                            <tbody>";
                            var index       = 0;
                            var boolGas     = $("input[name=boolGas]:checked", "#add_form").val();
                            var marketValue = $("#marketValue").val();
                            $.each(data, function(key, value) {
                                var premium = 0;
                                var imgLogo = '';
                                index ++;

                                marketValue = marketValue.replace(/\,/g,"");
                                if (boolGas == "1") {
                                    premium = parseFloat(marketValue) / 100 * parseFloat(value.gas);
                                } else {
                                    premium = parseFloat(marketValue) / 100 * parseFloat(value.gasoline);
                                }
                                if (value.logo != '') {
                                    imgLogo = "<img src='/uploads/logos/"+ value.logo +"' height='40'>"
                                }

                                resultTable += " \
                                    <tr> \
                                        <td>"+ index +"</td> \
                                        <td>"+ imgLogo +"</td> \
                                        <td>"+ value.insurername +"</td> \
                                        <td>"+ value.tproductname +"</td> \
                                        <td>"+ value.abbreviation +"</td> \
                                        <td>"+ formatMoney(value.compressive) +"%</td> \
                                        <td>"+ value.deductibles +"</td> \
                                        <td>"+ value.judicial +"</td> \
                                        <td>"+ value.civil +"</td> \
                                        <td>"+ value.personal +"</td> \
                                        <td>"+ value.road +"</td> \
                                        <td>"+ value.vehicle +"</td> \
                                        <td>"+ value.motor +"</td> \
                                        <td>$"+ formatMoney(premium) +"</td> \
                                    </tr>";
                            });
                            resultTable += "</tbody>";
                            $("#resultTable").html(resultTable);
                        }
                    }
                });
            });
        });

        function init() {
            $('#insurer').val('{{ $data->tinsurer_id }}');
            $('#brand').val('{{ $data->brand_id }}');
            $('#use').val('{{ $data->use_id }}');
            $('#status').val('{{ $data->status_id }}');

            id = $('#brand option:selected').val();
            getModels(id);
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

        function formatMoney(amount, decimalCount = 2, decimal = ".", thousands = ",") {
            decimalCount = Math.abs(decimalCount);
            decimalCount = isNaN(decimalCount) ? 2 : decimalCount;
            const negativeSign = amount < 0 ? "-" : "";
            let i = parseInt(amount = Math.abs(Number(amount) || 0).toFixed(decimalCount)).toString();
            let j = (i.length > 3) ? i.length % 3 : 0;
            return negativeSign + (j ? i.substr(0, j) + thousands : '') + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands) + (decimalCount ? decimal + Math.abs(amount - i).toFixed(decimalCount).slice(2) : "");
        }
    </script>
@endsection