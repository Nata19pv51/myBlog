<?php
/**
 * Created by PhpStorm.
 * User: Natasha
 * Date: 05.11.2017
 * Time: 22:17
 */

@extends('layouts.admin')

@section('content')
    <h3 class="page-title">Permissions</h3>

    <p>
        <a href="{{ route('permissions.create') }}" class="btn btn-success">Add new</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            List
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($permissions) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                <tr>
                    <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                    <th>Title</th>
                    <th>&nbsp;</th>
                </tr>
                </thead>

                <tbody>
                @if (count($permissions) > 0)
                    @foreach ($permissions as $permission)
                        <tr data-entry-id="{{ $permission->id }}">
                            <td></td>
                            <td>{{ $permission->title }}</td>
                            <td><a href="{{ route('permissions.show',[$permission->id]) }}" class="btn btn-xs btn-primary">View</a><a href="{{ route('permissions.edit',[$permission->id]) }}" class="btn btn-xs btn-info">Edit</a>{!! Form::open(array(
                'style' => 'display: inline-block;',
                'method' => 'DELETE',
                'onsubmit' => "return confirm('Are you sure?');",
                'route' => ['permissions.destroy', $permission->id])) !!}
                                {!! Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')) !!}
                                {!! Form::close() !!}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3">No entries in table</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>

    </script>
@endsection