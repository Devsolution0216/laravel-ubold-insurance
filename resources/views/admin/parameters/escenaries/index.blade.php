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
                        <li class="breadcrumb-item active">@lang('menus.quote escenaries')</li>
                    </ol>
                </div>
                <h4 class="page-title">@lang('menus.quote escenaries')</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="" style="margin-top: 25px; margin-left: 25px;">
            <a href="{{ route('escenaries.create') }}" class="btn btn-success"><i class="icon-plus"></i> @lang('menus.add') </a>
        </div>
        <div class="card-body">
            <div class="responsive-table-plugin">
                    <div class="table-rep-plugin">
                        <div class="table-responsive">
                            <table id="dataTable" class="table dt-responsive table-striped nowrap dataTable no-footer mb-0">
                                <thead>
                                    <tr>
                                        <th width="10%">#</th>
                                        <th width="15%">@lang('parameters.insurance company')</th>
                                        <th width="15%">@lang('parameters.product name')</th>
                                        <th width="10%">@lang('parameters.abbreviation product')</th>
                                        <th width="10%">@lang('parameters.brand')</th>
                                        <th width="10%">@lang('parameters.model')</th>
                                        <th width="10%">@lang('parameters.year')</th>
                                        <th width="20%">@lang('menus.action')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $index = 0 @endphp
                                    @foreach ($datas as $data)
                                        @php $index ++ @endphp
                                        <tr>
                                            <td>{{ $index }}</td>
                                            <td>{{ $data->insurername }}</td>
                                            <td>{{ $data->tproductname }}</td>
                                            <td>{{ $data->abbreviation }}</td>
                                            <td>{{ $data->brandname }}</td>
                                            <td>{{ $data->modelname }}</td>
                                            <td>{{ $data->year }}</td>
                                            <td>
                                                <a href="{{ URL::to('/escenaries/' . $data->id) }}" class="btn btn-info btn-xs waves-effect waves-light"><i class="mdi mdi-eye"></i> @lang('menus.view') </a>
                                                <a href="{{ URL::to('/escenaries/' . $data->id . '/edit') }}" class="btn btn-warning btn-xs waves-effect waves-light"><i class="mdi mdi-square-edit-outline"></i> @lang('menus.modify') </a>
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
                        url: "/escenaries/" + id,
                        type: 'delete',
                        success: function(data) {
                            window.location="{{ route('escenaries.index') }}";
                        }
                    });
                }
            });
        }
    </script>
@endsection