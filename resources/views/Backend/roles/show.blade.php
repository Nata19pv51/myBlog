<?php
/**
 * Created by PhpStorm.
 * User: Natasha
 * Date: 04.11.2017
 * Time: 21:28
 */

@extends('layouts.admin')

@section('content')
    <h3 class="page-title">Roles</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            View
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr><th>Title</th>
                            <td>{{ $role->title }}</td></tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('roles.index') }}" class="btn btn-default">Back to list</a>
        </div>
    </div>
@stop