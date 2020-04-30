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
                        <li class="breadcrumb-item active">@lang('menus.customer report')</li>
                    </ol>
                </div>
                <h4 class="page-title">@lang('menus.customer report')</h4>
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
                                        <th>#</th>
                                        <th>@lang('customers.name and lastname')</th>
                                        <th>@lang('customers.telephone number')</th>
                                        <th>@lang('customers.cell phone number')</th>
                                        <th>@lang('customers.email')</th>
                                        <th>@lang('customers.address')</th>
                                        <th>@lang('menus.action')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $index = 0 @endphp
                                    @foreach ($datas as $data)
                                        @php $index ++ @endphp
                                        <tr>
                                            <td>{{ $index }}</td>
                                            <td>{{ $data->first_last }}</td>
                                            <td>{{ $data->telephone }}</td>
                                            <td>{{ $data->cellphone }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td>{{ $data->address }}</td>
                                            <td>
                                                <div class="btn-group mb-2">
                                                    <!-- <button type="button" class="btn btn-warning btn-xs waves-effect waves-light"><i class="mdi mdi-star"></i> @lang('menus.policies') </button> -->
                                                </div>
                                                <div class="btn-group mb-2">
                                                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-settings"></i> @lang('menus.action') <i class="mdi mdi-chevron-down"></i></button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{ URL::to('/customers/' . $data->id) }}"><i class="mdi mdi-eye"></i> @lang('menus.view') </a>
                                                        <a class="dropdown-item" href="{{ URL::to('/customers/' . $data->id . '/edit') }}"><i class="mdi mdi-square-edit-outline"></i> @lang('menus.modify') </a>
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
                        url: "/customers/destroy/" + id,
                        type: 'post',
                        dataType: 'text',
                        success: function(data) {
                            window.location="{{ route('customers.index') }}";
                        }
                    });
                }
            });
        }
    </script>
@endsection