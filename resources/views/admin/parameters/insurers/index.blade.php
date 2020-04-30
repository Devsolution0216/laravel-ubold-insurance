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
                        <li class="breadcrumb-item active">@lang('menus.list insurers')</li>
                    </ol>
                </div>
                <h4 class="page-title">@lang('menus.list insurers')</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="" style="margin-top: 25px; margin-left: 25px;">
            <button class="btn btn-success" data-toggle="modal" data-target="#add_modal"><i class="icon-plus"></i> @lang('menus.add') </button>
        </div>
        <div class="card-body">
            <div class="responsive-table-plugin">
                <div class="table-rep-plugin">
                    <div class="table-responsive">
                        <table id="dataTable" class="table dt-responsive table-striped nowrap dataTable no-footer mb-0">
                            <thead>
                                <tr>
                                    <th width="10%">#</th>
                                    <th width="20%">@lang('customers.name')</th>
                                    <th width="20%">@lang('parameters.type')</th>
                                    <th width="20%">@lang('parameters.logo')</th>
                                    <th width="30%">@lang('menus.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $index = 0 @endphp
                                @foreach ($datas as $data)
                                    @php $index ++ @endphp
                                    <tr>
                                        <td>{{ $index }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->typename }}</td>
                                        <td>
                                            @if ($data->logo != '')
                                                <img src="/uploads/logos/{{ $data->logo }}" height="40" />
                                            @else
                                                <img src="/assets/images/no_image.png" height="40"/>
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-warning btn-xs waves-effect waves-light" onclick="editModal({{ $data }})"><i class="mdi mdi-square-edit-outline"></i> @lang('menus.modify') </button>
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

    <!-- Add Modal -->
    <div id="add_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="add_form" method="post" action="{{ route('insurers.store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <h4 class="modal-title">@lang('parameters.add insurers')</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="form-group">
                            <label for="add_name" class="control-label">@lang('customers.name')*</label>
                            <input type="text" class="form-control" id="add_name" name="add_name" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="add_type" class="control-label">@lang('parameters.type')*</label>
                            <select class="form-control" id="add_type" name="add_type" required>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="add_file" class="control-label">@lang('parameters.logo')</label>
                            <input type="file" class="dropify" data-height="70" id="add_file" name="add_file" accept="image/png, image/jpeg"/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">@lang('policies.close')</button>
                        <button type="submit" class="btn btn-info waves-effect waves-light">@lang('global.app_save')</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- Add Modal -->

    <!-- Edit Modal -->
    <div id="edit_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="edit_form" action="/insurers/id" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="modal-header">
                        <h4 class="modal-title">@lang('parameters.edit insurers')</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body p-4">
                        <label for="edit_name" class="control-label">Name</label>
                        <input type="text" class="form-control" id="edit_name" name="edit_name" placeholder="" required/>
                        <div class="form-group">
                            <label for="edit_type" class="control-label">@lang('parameters.type')*</label>
                            <select class="form-control" id="edit_type" name="edit_type" required>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit_file" class="control-label">@lang('parameters.logo')</label>
                            <input type="file" class="dropify" data-height="70" id="edit_file" name="edit_file" accept="image/png, image/jpeg" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">@lang('policies.close')</button>
                        <button type="submit" class="btn btn-info waves-effect waves-light" onclick="$('#edit_form').attr('action', '/insurers/'+g_id);">@lang('customers.save change')</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- Edit Modal -->
@stop

@section('javascript') 
    <script>
        var g_id = 0;
        function editModal(data) {
            $('#edit_name').val(data['name']);
            $('#edit_type').val(data['type_id']);
            g_id = data['id'];
            $('#edit_modal').modal('show');
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
                        url: "/insurers/destroy/" + id,
                        type: 'post',
                        dataType: 'text',
                        success: function(data) {
                            window.location="{{ route('insurers.index') }}";
                        }
                    });
                }
            });
        }
    </script>
@endsection