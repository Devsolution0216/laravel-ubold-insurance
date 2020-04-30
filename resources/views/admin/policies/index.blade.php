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
                        <li class="breadcrumb-item active">@lang('menus.policies')</li>
                    </ol>
                </div>
                <h4 class="page-title">@lang('menus.policies')</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3" style="text-align: right; margin-bottom: 10px;">
                    <select class="form-control" id="dateType" required>
                        <option value="create_date">@lang('policies.created date')</option>
                        <option value="activation_date">@lang('policies.activation date')</option>
                        <option value="star_date">@lang('policies.star date')</option>
                        <option value="final_date">@lang('policies.final date')</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="text" id="range-datepicker" class="form-control flatpickr-input" placeholder="2019-10-03 to 2019-10-10" readonly="readonly">
                </div>
                <div class="col-md-3">
                    <button class="btn btn-danger waves-effect waves-light" onclick="search();"><i class="fe-search"> @lang('policies.search')</i></button>
                </div>
                <div class="col-md-3" style="text-align: right; margin-bottom: 10px;">
                    <button class="btn btn-primary waves-effect waves-light" onclick="policiesExcel();"><i class="mdi mdi-file-excel"> @lang('policies.export')</i></button>
                </div>
            </div>
            <div class="responsive-table-plugin">
                <div class="table-rep-plugin">
                    <div class="table-responsive">
                        <table id="dataTable" class="table dt-responsive table-striped nowrap dataTable no-footer mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('parameters.brand')</th>
                                    <th>@lang('parameters.model')</th>
                                    <th>@lang('parameters.year')</th>
                                    <th>@lang('parameters.insurance company')</th>
                                    <th>@lang('quotations.status')</th>
                                    <th>@lang('policies.star date policy')</th>
                                    <th>@lang('policies.final date policy')</th>
                                    <th>@lang('policies.aging')</th>
                                    <th>@lang('menus.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $index = 0 @endphp
                                @foreach ($datas as $data)
                                    @php $index ++ @endphp
                                    <tr>
                                        <td>{{ $index }}</td>
                                        <td>{{ $data->brandname }}</td>
                                        <td>{{ $data->modelname }}</td>
                                        <td>{{ $data->year }}</td>
                                        <td>{{ $data->insurername }}</td>
                                        @switch ($data->status_id)
                                            @case(1)
                                                <td><span class="badge badge-info">@lang('policies.vigente')</span></td>
                                                @break
                                            @case(2)
                                                <td><span class="badge badge-success">@lang('policies.expirated')</span></td>
                                                @break
                                            @case(3)
                                                <td><span class="badge badge-warning">@lang('policies.renewed')</span></td>
                                                @break
                                            @case(4)
                                                <td><span class="badge badge-danger">@lang('policies.withdrawn')</span></td>
                                                @break
                                        @endswitch
                                        <td>{{ $data->star_date }}</td>
                                        <td>{{ $data->final_date }}</td>
                                        @if (!$data->aging)
                                            <td>0</td>
                                        @else
                                            @if ($data->aging < 4)
                                                <td>{{ $data->aging }}</td>
                                            @else
                                                <td>+ 4</td>
                                            @endif
                                        @endif
                                        <td>
                                            <div class="btn-group mb-2">
                                                <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-settings"></i> @lang('menus.action') <i class="mdi mdi-chevron-down"></i></button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{ URL::to('/policies/' . $data->id) }}"><i class="mdi mdi-eye"></i> @lang('menus.view') </a>
                                                    <a class="dropdown-item" href="{{ URL::to('/policies/' . $data->id . '/edit') }}"><i class="mdi mdi-square-edit-outline"></i> @lang('menus.modify') </a>
                                                    <button class="dropdown-item" onclick="del({{ $data->id }})"><i class="mdi mdi-delete"></i> @lang('menus.delete') </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        $(document).ready(function(){
            init();
        });

        function init() {
            $("#range-datepicker").flatpickr({mode:"range"});
        }

        function del(id) {
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
                        url: "/policies/destroy/" + id,
                        type: 'post',
                        dataType: 'text',
                        success: function(data) {
                            window.location="{{ route('policies.index') }}";
                        }
                    });
                }
            });
        }

        function policiesExcel() {
            var htmls = "";
            var uri = 'data:application/vnd.ms-excel;base64,';
            var template = '<table> \
                <tr> \
                    <td>#</td> \
                    <td><span style="font-weight:bold">'+ @json(__('parameters.brand')) +'.</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('parameters.model')) +'.</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('parameters.year')) +'</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('policies.chassis')) +'</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('policies.enrollment')) +'</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('policies.color')) +'</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('policies.circulation zone')) +'</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('policies.fuel type')) +'</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('policies.number of doors')) +'</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('policies.type of use')) +'</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('policies.condition')) +'</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('policies.risk')) +'</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('policies.passengers')) +'</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('policies.cylinders')) +'</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('policies.peso del vehiculo (toneladas)')) +'</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('customers.name and lastname')) +'</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('customers.type of document')) +'</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('customers.document number')) +'</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('customers.address')) +'</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('customers.city')) +'</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('customers.provinces')) +'</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('customers.telephone number')) +'</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('policies.cellphone number')) +'</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('customers.email')) +'</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('customers.date of birth')) +'</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('policies.ocuppational')) +'</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('customers.subagents')) +'</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('policies.insurance company')) +'</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('policies.list type of product')) +'</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('quotations.status')) +'</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('policies.created date')) +'</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('policies.activation date policy')) +'</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('policies.star date policy')) +'</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('policies.final date policy')) +'</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('policies.policies id')) +'</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('policies.reference external')) +'</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('policies.reference internal')) +'</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('policies.financing amount')) +'</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('parameters.market value')) +'</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('policies.premium total annual')) +'</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('policies.premium net')) +'</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('policies.premium month')) +'</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('policies.isc (16.0%)')) +'</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('policies.payment plan')) +'</span></td> \
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
                url: "/policies/policiesExcel",
                type: 'post',
                dataType: 'text',
                success: function(data) {
                    template += data + '</table>';

                    var link = document.createElement("a");
                    link.download = "Policies.xls";
                    link.href = uri + base64(format(template, ctx));
                    link.click();
                }
            });
        }

        function search() {
            var type = $("#dateType").val();
            var dates = $("#range-datepicker").val();
            if (dates == '')
                return;

            $.ajax({
                url: "/policies/getSearch/"+type+"/"+dates,
                type: 'post',
                dataType: 'json',
                success: function(data) {
                    var html = 
                        '<thead>' +
                            '<tr>' +
                                '<th>#</th>' +
                                '<th>'+ @json(__('parameters.brand')) +'</th>' +
                                '<th>'+ @json(__('parameters.model')) +'</th>' +
                                '<th>'+ @json(__('parameters.year')) +'</th>' +
                                '<th>'+ @json(__('parameters.insurance company')) +'</th>' +
                                '<th>'+ @json(__('quotations.status')) +'</th>' +
                                '<th>'+ @json(__('policies.star date policy')) +'</th>' +
                                '<th>'+ @json(__('policies.final date policy')) +'</th>' +
                                '<th>'+ @json(__('policies.aging')) +'</th>' +
                                '<th>'+ @json(__('menus.action')) +'</th>' +
                            '</tr>' +
                        '</thead>' +
                        '<tbody>';
                    var index = 1;
                    $.each(data, function(key, value) {
                        html += ' \
                            <tr> \
                                <td>'+ index +'</td> \
                                <td>'+ value.brandname +'</td> \
                                <td>'+ value.modelname +'</td> \
                                <td>'+ value.year +'</td> \
                                <td>'+ value.insurername +'</td>';
                        
                        var status = '<td></td>';
                        var aging = '<td></td>';
                        switch(value.status_id) {
                            case '1':
                                status = '<td><span class="badge badge-warning">'+ @json(__('policies.vigente')) +'</span></td>';
                                break;
                            case '2':
                                status = '<td><span class="badge badge-success">'+ @json(__('policies.expirated')) +'</span></td>';
                                break;
                            case '3':
                                status = '<td><span class="badge badge-info">'+ @json(__('policies.renewed')) +'</span></td>';
                                break;
                            case '4':
                                status = '<td><span class="badge badge-danger">'+ @json(__('policies.withdrawn')) +'</span></td>';
                                break;
                        }
                        html += status + ' \
                                <td>'+ value.star_date +'</td> \
                                <td>'+ value.final_date +'</td>';
                        if (!value.aging) {
                            aging = '<td>0</td>';
                        } else {
                            if (value.aging < 4)
                                aging = '<td>'+ value.aging +'</td>';
                            else
                                aging = '<td>+ 4</td>';
                        }
                        html += aging + ' \
                                <td> \
                                    <div class="btn-group mb-2"> \
                                        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-settings"></i> '+ @json(__('menus.action')) +' <i class="mdi mdi-chevron-down"></i></button> \
                                        <div class="dropdown-menu"> \
                                            <a class="dropdown-item" href="/policies/'+ value.id +'"><i class="mdi mdi-eye"></i> '+ @json(__('menus.view')) +' </a> \
                                            <a class="dropdown-item" href="/policies/'+ value.id +'/edit"><i class="mdi mdi-square-edit-outline"></i> '+ @json(__('menus.modify')) +' </a> \
                                            <button class="dropdown-item" onclick="del('+ value.id +');"><i class="mdi mdi-delete"></i> '+ @json(__('menus.delete')) +' </button> \
                                        </div> \
                                    </div> \
                                </td> \
                            </tr>';

                        index ++;
                    });
                    html += '</tbody>';
                    $( "#dataTable" ).html(html);
                }
            });
        }
    </script>
@endsection