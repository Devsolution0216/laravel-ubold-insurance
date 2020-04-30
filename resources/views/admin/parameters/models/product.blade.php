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
                        <li class="breadcrumb-item active">
                            <a href="{{ route('models.index') }}"> @lang('menus.list of models') </a>
                        </li>
                        <li class="breadcrumb-item active">@lang('parameters.model products')</li>
                    </ol>
                </div>
                <h4 class="page-title">@lang('parameters.model products')</h4>
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
                    <div class="table-responsive" data-pattern="priority-columns">
                        <table id="dataTable" class="table dt-responsive table-striped nowrap dataTable no-footer mb-0">
                            <thead>
                                <tr>
                                    <th width="10%">#</th>
                                    <th width="15%">@lang('parameters.model')</th>
                                    <th width="15%">@lang('parameters.use')</th>
                                    <th width="20%">@lang('parameters.insurer')</th>
                                    <th width="20%">@lang('parameters.product')</th>
                                    <th width="20%">@lang('menus.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $index = 0 @endphp
                                @foreach ($datas as $data)
                                    @php $index ++ @endphp
                                    <tr>
                                        <td>{{ $index }}</td>
                                        <td>{{ $data->modelname }}</td>
                                        <td>{{ $data->usename }}</td>
                                        <td>{{ $data->insurername }}</td>
                                        <td>{{ $data->tproductname }}</td>
                                        <td>
                                            <button type="button" class="btn btn-warning btn-xs waves-effect waves-light" onclick="editModal({{ $data }})">
                                                <i class="mdi mdi-square-edit-outline"></i> @lang('menus.modify')
                                            </button>
                                            <button type="button" class="btn btn-danger btn-xs waves-effect waves-light" onclick="del({{ $data->id }})">
                                                <i class="mdi mdi-delete"></i> @lang('menus.delete')
                                            </button>
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
                <form id="add_form" method="post" action="{{ url('/models/products') }}">
                    <div class="modal-header">
                        <h4 class="modal-title">@lang('parameters.add product')</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body p-4">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="add_model" class="control-label">@lang('parameters.model')</label>
                            <input type="text" class="form-control" id="add_model" name="add_model" value="{{ $model->name }}" disabled/>
                            <input type="text" class="form-control" id="add_modelId" name="add_modelId" value="{{ $model->id }}" hidden />
                        </div>
                        <div class="form-group">
                            <label for="add_use" class="control-label">@lang('parameters.use')*</label>
                            <select class="form-control" id="add_use" name="add_use" required>
                                @foreach ($uses as $use)
                                    <option value="{{ $use->id }}">{{ $use->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="add_insurer" class="control-label">@lang('parameters.insurer')*</label>
                            <select class="form-control" id="add_insurer" name="add_insurer" required>
                                @foreach ($insurers as $insurer)
                                    <option value="{{ $insurer->id }}">{{ $insurer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="add_tproduct" class="control-label">@lang('parameters.tproduct')*</label>
                            <select class="form-control" id="add_tproduct" name="add_tproduct" required>
                                @foreach ($tproducts as $tproduct)
                                    <option value="{{ $tproduct->id }}">{{ $tproduct->name }}</option>
                                @endforeach
                            </select>
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
                <form id="edit_form" action="/models/products/id" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title">@lang('parameters.edit product')</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body p-4">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="edit_model" class="control-label">@lang('parameters.model')</label>
                            <input type="text" class="form-control" id="edit_model" name="edit_model" value="{{ $model->name }}" disabled/>
                            <input type="text" class="form-control" id="edit_modelId" name="edit_modelId" value="{{ $model->id }}" hidden />
                        </div>
                        <div class="form-group">
                            <label for="edit_use" class="control-label">@lang('parameters.use')*</label>
                            <select class="form-control" id="edit_use" name="edit_use" required>
                                @foreach ($uses as $use)
                                    <option value="{{ $use->id }}">{{ $use->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit_insurer" class="control-label">@lang('parameters.insurer')*</label>
                            <select class="form-control" id="edit_insurer" name="edit_insurer" required>
                                @foreach ($insurers as $insurer)
                                    <option value="{{ $insurer->id }}">{{ $insurer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit_tproduct" class="control-label">@lang('parameters.tproduct')*</label>
                            <select class="form-control" id="edit_tproduct" name="edit_tproduct" required>
                                @foreach ($tproducts as $tproduct)
                                    <option value="{{ $tproduct->id }}">{{ $tproduct->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">@lang('policies.close')</button>
                        <button type="submit" class="btn btn-info waves-effect waves-light" onclick="$('#edit_form').attr('action', '/models/products/'+g_id);">@lang('customers.save change')</button>
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
            $('#edit_use').val(data['use_id']);
            $('#edit_insurer').val(data['insurer_id']);
            $('#edit_tproduct').val(data['tproduct_id']);
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
                        url: "/models/products/destroy/" + id,
                        type: 'post',
                        dataType: 'text',
                        success: function(data) {
                            window.location="/models/{{ $model->id }}";
                        }
                    });
                }
            });
        }
    </script>
@endsection