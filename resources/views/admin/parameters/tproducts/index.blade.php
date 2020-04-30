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
                        <li class="breadcrumb-item active">@lang('menus.list type of products')</li>
                    </ol>
                </div>
                <h4 class="page-title">@lang('menus.list type of products')</h4>
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
                                    <th width="20%">@lang('parameters.insurance company')</th>
                                    <th width="20%">@lang('parameters.name')</th>
                                    <th width="25%">@lang('parameters.abbreviation')</th>
                                    <th width="25%">@lang('menus.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $index = 0 @endphp
                                @foreach ($datas as $data)
                                    @php $index ++ @endphp
                                    <tr>
                                        <td>{{ $index }}</td>
                                        <td>{{ $data->insurername }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->abbreviation }}</td>
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
                <form id="add_form" method="post" action="{{ route('tproducts.store') }}">
                    <div class="modal-header">
                        <h4 class="modal-title">@lang('parameters.add quotation status')</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body p-4">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="add_insurance" class="control-label">@lang('parameters.insurance company')*</label>
                            <select class="form-control" id="add_insurance" name="add_insurance" required>
                                @foreach ($insurances as $insurance)
                                    <option value="{{ $insurance->id }}">{{ $insurance->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="add_name" class="control-label">@lang('parameters.name')*</label>
                            <input type="text" class="form-control" id="add_name" name="add_name" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="add_abbreviation" class="control-label">@lang('parameters.abbreviation')*</label>
                            <input type="text" class="form-control" id="add_abbreviation" name="add_abbreviation" placeholder="" required>
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
                <form id="edit_form" action="/tproducts/id" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title">@lang('parameters.edit quotation status')</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body p-4">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label for="edit_insurance" class="control-label">@lang('parameters.insurance company')*</label>
                            <select class="form-control" id="edit_insurance" name="edit_insurance" required>
                                @foreach ($insurances as $insurance)
                                    <option value="{{ $insurance->id }}">{{ $insurance->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit_name" class="control-label">@lang('parameters.name')*</label>
                            <input type="text" class="form-control" id="edit_name" name="edit_name" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_abbreviation" class="control-label">@lang('parameters.abbreviation')*</label>
                            <input type="text" class="form-control" id="edit_abbreviation" name="edit_abbreviation" placeholder="" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">@lang('policies.close')</button>
                        <button type="submit" class="btn btn-info waves-effect waves-light" onclick="$('#edit_form').attr('action', '/tproducts/'+g_id);">@lang('customers.save change')</button>
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
            $('#edit_insurance').val(data['insurer_id']);
            $('#edit_name').val(data['name']);
            $('#edit_abbreviation').val(data['abbreviation']);
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
                        url: "/tproducts/destroy/" + id,
                        type: 'post',
                        dataType: 'text',
                        success: function(data) {
                            window.location="{{ route('tproducts.index') }}";
                        }
                    });
                }
            });
        }
    </script>
@endsection