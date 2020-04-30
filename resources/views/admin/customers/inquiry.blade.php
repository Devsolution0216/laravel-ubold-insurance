@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active"><i class="dripicons-question"></i> @lang('menus.payment report')</li>
                    </ol>
                </div>
                <h4 class="page-title">@lang('menus.payment report')</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="col-md-12" style="text-align: right; margin-bottom: 10px;">
                <button class="btn btn-primary waves-effect waves-light" onclick="excel();"><i class="mdi mdi-file-excel"> @lang('policies.export')</i></button>
            </div>
            <div class="responsive-table-plugin">
                <div class="table-rep-plugin">
                    <div class="table-responsive">
                        <table id="dataTable" class="table dt-responsive table-striped nowrap dataTable no-footer" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('policies.policies id')</th>
                                    <th>@lang('policies.tipo documento')</th>
                                    <th>@lang('policies.aviso cobro')</th>
                                    <th>@lang('policies.prima comercial')</th>
                                    <th>@lang('policies.prima neta')</th>
                                    <th>@lang('policies.prima total')</th>
                                    <th>@lang('policies.concepto')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $index = 0 @endphp
                                @foreach ($datas as $data)
                                    @php $index ++ @endphp
                                    <tr>
                                        <td>{{ $index }}</td>
                                        <td>{{ $data->policiesID }}</td>
                                        <td>{{ $data->tipo }}</td>
                                        <td>{{ $data->aviso }}</td>
                                        <td>$ {{ number_format($data->comercial, 2) }}</td>
                                        <td>$ {{ number_format($data->neta, 2) }}</td>
                                        <td>$ {{ number_format($data->total, 2) }}</td>
                                        <td>{{ $data->concepto }}</td>
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
        function excel() {
            var htmls = "";
            var uri = 'data:application/vnd.ms-excel;base64,';
            var template = '<table> \
                <tr> \
                    <td><span style="font-weight:bold">#</span></td> \
                    <td><span style="font-weight:bold">'+ @json(__('policies.policies id')) +'</span></td> \
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
                url: "/inquiry/excel",
                type: 'get',
                dataType: 'text',
                success: function(data) {
                    template += data + '</table>';

                    var link = document.createElement("a");
                    link.download = "Payment Report.xls";
                    link.href = uri + base64(format(template, ctx));
                    link.click();
                }
            });
        }
    </script>
@endsection