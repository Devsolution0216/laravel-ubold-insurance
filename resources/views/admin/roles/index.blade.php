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
                        <li class="breadcrumb-item active">@lang('menus.user roles')</li>
                    </ol>
                </div>
                <h4 class="page-title">@lang('menus.user roles')</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="" style="margin-top: 25px; margin-left: 25px;">
            <a href="{{ route('admin.roles.create') }}" class="btn btn-success"><i class="icon-plus"></i> @lang('global.app_add_new') </a>
        </div>
        <div class="card-body">
            <div class="responsive-table-plugin">
                <div class="table-rep-plugin">
                    <div class="table-responsive">
                        <table id="dataTable" class="table dt-responsive table-striped nowrap dataTable no-footer">
                            <thead>
                                <tr>
                                    <th width="10%">#</th>
                                    <th width="40%">@lang('global.roles.fields.name')</th>
                                    <th width="20%">@lang('global.roles.fields.permission')</th>
                                    <th width="30%">@lang('menus.action')</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @if (count($roles) > 0)
                                    @php $index = 0 @endphp
                                    @foreach ($roles as $role)
                                        @php $index ++ @endphp
                                        <tr data-entry-id="{{ $role->id }}">
                                            <td>{{ $index }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>
                                                @foreach ($role->permissions()->pluck('name') as $permission)
                                                    <div class="badge label-table badge-{{ $permission == 'users_manage' ? 'info' : 'warning' }}"> {{ $permission }} </div>
                                                @endforeach
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.roles.edit',[$role->id]) }}" class="btn btn-xs btn-info"><i class="mdi mdi-square-edit-outline"></i> @lang('global.app_edit')</a>
                                                {!! Form::open(array(
                                                    'class' => 'needs-validation',
                                                    'style' => 'display: inline-block;',
                                                    'method' => 'DELETE',
                                                    'route' => ['admin.roles.destroy', $role->id])) !!}
                                                {{ Form::button('<i class="fa fa-trash"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-xs btn-danger'] ) }}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6">@lang('global.app_no_entries_in_table')</td>
                                    </tr>
                                @endif
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

        window.route_mass_crud_entries_destroy = '{{ route('admin.roles.mass_destroy') }}';
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