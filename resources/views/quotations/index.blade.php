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
                        <li class="breadcrumb-item active">@lang('menus.quotation report')</li>
                    </ol>
                </div>
                <h4 class="page-title">@lang('menus.quotation report')</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="responsive-table-plugin">
                <div class="table-rep-plugin">
                    <div class="table-responsive">
                        <table id="dataTable" class="table dt-responsive table-striped nowrap dataTable no-footer mb-0">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="10%">@lang('quotations.type of insurance')</th>
                                    <th width="10%">@lang('quotations.emited by')</th>
                                    <th width="10%">@lang('quotations.brands')</th>
                                    <th width="10%">@lang('quotations.models')</th>
                                    <th width="5%">@lang('quotations.year')</th>
                                    <th width="10%">@lang('quotations.use')</th>
                                    <th width="10%">@lang('quotations.prospective client')</th>
                                    <th width="10%">@lang('quotations.status')</th>
                                    <th width="20%">@lang('menus.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $index = 0 @endphp
                                @foreach ($datas as $data)
                                    @php $index ++ @endphp
                                    <tr>
                                        <td>{{ $index }}</td>
                                        <td>{{ $data->tinsurername }}</td>
                                        <td>{{ $data->username }}</td>
                                        <td>{{ $data->brandname }}</td>
                                        <td>{{ $data->modelname }}</td>
                                        <td>{{ $data->year }}</td>
                                        <td>{{ $data->usename}}</td>
                                        <td>{{ $data->prospect}}</td>
                                        <td>{{ $data->statusname }}</td>
                                        <td>
                                            <a href="{{ url('uploads/pdfs/' . $data->pdf) }}" class="btn btn-blue btn-xs waves-effect waves-light" download="Quotation.pdf"><i class="mdi mdi-file-pdf"></i> @lang('PDF') </a>
                                            <a href="{{ URL::to('/quotations/' . $data->id) }}" class="btn btn-info btn-xs waves-effect waves-light"><i class="mdi mdi-eye"></i> @lang('menus.view') </a>
                                            <a href="{{ URL::to('/quotations/' . $data->id . '/edit') }}" class="btn btn-warning btn-xs waves-effect waves-light"><i class="mdi mdi-square-edit-outline"></i> @lang('menus.modify') </a>
                                            <button type="button" class="btn btn-danger btn-xs waves-effect waves-light" onclick="del({{ $data->id }})"><i class="mdi mdi-delete"></i> @lang('menus.delete') </button>
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
                        url: "/quotations/destroy/" + id,
                        type: 'post',
                        dataType: 'text',
                        success: function(data) {
                            window.location="{{ route('quotations.index') }}";
                        }
                    });
                }
            });
        }
    </script>
@endsection