<?php
/**
 * Created by PhpStorm.
 * User: Natasha
 * Date: 05.11.2017
 * Time: 20:46
 */

@extends('layouts.admin')

@section('content')

    <div class="row">
        <h1 class="page-header">User</h1>
    </div>

    <div class="row">
        {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch', 'class' => 'edit']) !!}

        <div class="panel panel-default">
            <div class="panel-heading">
                Edit user
            </div>

            <div class="panel-body">
                <div class="col-md-8 form-group">
                    <div class="row">

                        <div class="col-md-8 form-group">
                            {!! Form::label('name', 'Name*', ['class' => 'control-label']) !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('name'))
                                <p class="help-block">
                                    {{ $errors->first('name') }}
                                </p>
                            @endif
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-xs-4 form-group">
                            {!! Form::label('email', 'Email*', ['class' => 'control-label']) !!}
                            {!! Form::email('email', null, ['class' => 'form-control']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('email'))
                                <p class="help-block">
                                    {{ $errors->first('email') }}
                                </p>
                            @endif
                        </div>
                        <div class="col-xs-4 form-group">
                            {!! Form::label('password', 'Password*', ['class' => 'control-label']) !!}
                            {!! Form::password('password',  ['class' => 'form-control']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('password'))
                                <p class="help-block">
                                    {{ $errors->first('password') }}
                                </p>
                            @endif
                        </div>
                        <div class="col-xs-8 form-group">
                            {!! Form::label('role_list', 'Roles:') !!}
                            {!! Form::select('role_list[]', $roles, $user->roles, ['id' => 'role_list', 'class' => 'form-control', 'multiple', 'style' => 'width: 100%']) !!}

                        </div>
                    </div>
                    <div class="form-group text-right">
                        <a href="{!! url('/users') !!}" class="btn btn-default raw-left">Cancel</a>
                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                    </div>

                    {!! Form::close() !!}
                </div>
                <div class="col-md-4">
                    <div class="well">

                        <dl class="dl-horizontal">
                            <label>Created At:</label>
                            <p>{{ date('M j, Y h:ia', strtotime($user->created_at)) }}</p>
                        </dl>

                        <dl class="dl-horizontal">
                            <label>Last Updated:</label>
                            <p>{{ date('M j, Y h:ia', strtotime($user->updated_at)) }}</p>
                        </dl>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                {!! Html::linkRoute('users.show', 'Show', array($user->id), array('class' => 'btn btn-primary btn-block')) !!}
                            </div>
                            <div class="col-sm-6">
                                {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'DELETE']) !!}

                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

                                {!! Form::close() !!}
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-md-12">
                                {{ Html::linkRoute('users.index', '<< See All Users', array(), ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
