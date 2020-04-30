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
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.roles.index') }}"> @lang('menus.user roles') </a>
                        </li>
                        <li class="breadcrumb-item active">@lang('menus.edit role')</li>
                    </ol>
                </div>
                <h4 class="page-title">@lang('menus.edit role')</h4>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="" style="margin-top: 25px; margin-left: 25px;">
            <a href="{{ route('admin.roles.index') }}"><i class="mdi mdi-arrow-left-drop-circle"></i> @lang('menus.back to user roles') </a>
        </div>
        <div class="card-body">
            {!! Form::model($role, ['method' => 'PUT', 'route' => ['admin.roles.update', $role->id]]) !!}
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="form-group row mb-3">
                        {!! Form::label('name', 'Name*', ['class' => 'col-md-3']) !!}
                        <div class="col-md-9">
                            {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        </div>
                        <p class="help-block"></p>
                        @if($errors->has('name'))
                            <p class="help-block">
                                {{ $errors->first('name') }}
                            </p>
                        @endif
                    </div>
                    <div class="form-group row mb-3">
                        {!! Form::label('permission', 'Permissions', ['class' => 'col-md-3']) !!}
                        <div class="col-md-9">
                            {!! Form::select('permission[]', $permissions, old('permission') ? old('permission') : $role->permissions()->pluck('name', 'name'), ['class' => 'form-control']) !!}
                        </div>
                        <p class="help-block"></p>
                        @if($errors->has('permission'))
                            <p class="help-block">
                                {{ $errors->first('permission') }}
                            </p>
                        @endif
                        <div class="col-md-3" style="margin-top: 10px;">
                            {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop

