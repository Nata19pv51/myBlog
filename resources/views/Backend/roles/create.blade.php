<?php
/**
 * Created by PhpStorm.
 * User: Natasha
 * Date: 04.11.2017
 * Time: 21:24
 */

@extends('layouts.admin')

@section('content')
    <h3 class="page-title">Roles</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['roles.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            Create
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('title', 'Title*', ['class' => 'control-label']) !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-12 form-group">
                    {!! Form::label('permission_list', 'Permissions:') !!}
                    {!! Form::select('permission_list[]', $permissions, null, ['id' => 'permission_list', 'class' => 'form-control', 'multiple', 'style' => 'width: 100%']) !!}

                </div>
            </div>

        </div>
    </div>

    {!! Form::submit('Save', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop