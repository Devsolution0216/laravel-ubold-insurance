@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}"><i class="fe-user-plus"></i><span> @lang('menus.user control') </span></a>
                        </li>
                        <li class="breadcrumb-item active">@lang('menus.users')</li>
                    </ol>
                </div>
                <h4 class="page-title">@lang('menus.users')</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="" style="margin-top: 25px; margin-left: 25px;">
            <a href="{{ route('admin.users.create') }}" class="btn btn-success"><i class="icon-plus"></i> @lang('global.app_add_new') </a>
        </div>
        <div class="card-body">
            <div class="responsive-table-plugin">
                <div class="table-rep-plugin">
                    <div class="table-responsive">
                        <table id="dataTable" class="table dt-responsive table-striped nowrap dataTable no-footer">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('global.users.fields.name')</th>
                                    <th>@lang('global.users.fields.email')</th>
                                    <th>@lang('global.users.fields.roles')</th>
                                    <th>@lang('menus.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $index = 0 @endphp
                                @foreach ($users as $user)
                                    @php $index ++ @endphp
                                    <tr data-entry-id="{{ $user->id }}">
                                        <td>{{ $index }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @foreach ($user->roles()->pluck('name') as $role)
                                                <span class="label label-info label-many">{{ $role }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.users.edit',[$user->id]) }}" class="btn btn-xs btn-info"><i class="mdi mdi-square-edit-outline"></i> @lang('global.app_edit')</a>
                                            {!! Form::open(array(
                                                'class' => 'needs-validation',
                                                'style' => 'display: inline-block;',
                                                'method' => 'DELETE',
                                                'route' => ['admin.users.destroy', $user->id])) !!}
                                            {{ Form::button('<i class="fa fa-trash"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-xs btn-danger'] ) }}
                                            {!! Form::close() !!}
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
        var flag = false;

        window.route_mass_crud_entries_destroy = '{{ route('admin.users.mass_destroy') }}';
        $(document).ready(function(){            
            $('.needs-validation').on('submit', function(evt) {
                var form = this;
                if (flag) {
                    flage = false;
                    return true;
                }
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
                        flag = true;
                        $(form).submit();
                    }
                });
                return false;
            });
        });
    </script>
@endsection