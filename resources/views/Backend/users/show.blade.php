<?php
/**
 * Created by PhpStorm.
 * User: Natasha
 * Date: 06.11.2017
 * Time: 21:31
 */

@extends('layouts.admin')

@section('content')


    <div class="row">
        <div class="col-md-8">
            <h1>{{ $user->name }}</h1>
            <h2>{{ $user->email }}</h2>
            <hr>
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
                        {!! Html::linkRoute('users.edit', 'Edit', array($user->id), array('class' => 'btn btn-primary btn-block')) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'DELETE']) !!}

                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        {{ Html::linkRoute('users.index', '<< See All Users', array(), ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
