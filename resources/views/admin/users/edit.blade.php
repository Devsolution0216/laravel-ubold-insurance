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
                            <a href="{{ route('admin.users.index') }}"> @lang('menus.users') </a>
                        </li>
                        <li class="breadcrumb-item active">@lang('menus.edit user')</li>
                    </ol>
                </div>
                <h4 class="page-title">@lang('menus.edit user')</h4>
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="" style="margin-top: 25px; margin-left: 25px;">
            <a href="{{ route('admin.users.index') }}"><i class="mdi mdi-arrow-left-drop-circle"></i> @lang('menus.back to users') </a>
        </div>
        <div class="card-body">
            {!! Form::model($user, ['method' => 'PUT', 'route' => ['admin.users.update', $user->id]]) !!}
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
                        {!! Form::label('email', 'Email*', ['class' => 'col-md-3']) !!}
                        <div class="col-md-9">
                            {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        </div>
                        <p class="help-block"></p>
                        @if($errors->has('email'))
                            <p class="help-block">
                                {{ $errors->first('email') }}
                            </p>
                        @endif
                    </div>
                    <div class="form-group row mb-3">
                        {!! Form::label('password', 'Password', ['class' => 'col-md-3']) !!}
                        <div class="col-md-9">
                            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '']) !!}
                        </div>
                        <p class="help-block"></p>
                        @if($errors->has('password'))
                            <p class="help-block">
                                {{ $errors->first('password') }}
                            </p>
                        @endif
                    </div>
                    <div class="form-group row mb-3">
                        {!! Form::label('roles', 'Roles*', ['class' => 'col-md-3']) !!}
                        <div class="col-md-9">
                            {!! Form::select('roles[]', $roles, old('roles') ? old('roles') : $user->roles()->pluck('name', 'name'), ['class' => 'form-control', 'required' => '']) !!}
                        </div>
                        <p class="help-block"></p>
                        @if($errors->has('roles'))
                            <p class="help-block">
                                {{ $errors->first('roles') }}
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

