<?php
/**
 * Created by PhpStorm.
 * User: Natasha
 * Date: 05.11.2017
 * Time: 20:41
 */

@extends('layouts.admin')

@section('content')

    <div class="row">
        <h1 class="page-header">User</h1>
    </div>

    <div class="row">
        {!! Form::open(['method' => 'POST', 'route' => 'users.store', 'class' => 'add']) !!}

        <div class="panel panel-default">
            <div class="panel-heading">
                Create user
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 form-group">
                        {!! Form::label('name', 'Name*', ['class' => 'control-label']) !!}
                        {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Enter User Name']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('name'))
                            <p class="help-block">
                                {{ $errors->first('name') }}
                            </p>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6 form-group">
                        {{ Form::label('email', 'Email:') }}
                        {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'Enter User Email']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('email'))
                            <p class="help-block">
                                {{ $errors->first('email') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-6 form-group">
                        {!! Form::label('password', 'Password:', ['class' => 'control-label']) !!}

                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Enter User password']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('password'))
                            <p class="help-block">
                                {{ $errors->first('password') }}
                            </p>
                        @endif
                    </div>

                    <div class="col-xs-12 form-group">
                        {!! Form::label('role_list', 'Roles:') !!}
                        {!! Form::select('role_list[]', $roles, null, ['id' => 'role_list', 'class' => 'form-control', 'multiple', 'style' => 'width: 100%']) !!}

                    </div>
                </div>
            </div>
        </div>
        <div class="form-group text-right">
            <a href="{!! url('/users') !!}" class="btn btn-default raw-left">Cancel</a>
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>
@endsection
