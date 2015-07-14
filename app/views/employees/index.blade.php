@extends('layout.layout')
@section('contents')
    {{Form::open(['route'=>'employees.store', 'method'=>'post'])}}
    <div class="row">
        <div class="col-xs-1">
            {{Form::label('name', '担当者名')}}
        </div>
        <div class="col-xs-3">
            {{Form::text('name', '担当者名', ['class' => 'form-control'])}}
        </div>
        <div class="col-xs-2">
            {{Form::submit('登録', ['name' => 'createEmployee'])}}
        </div>
        <div class="col-xs-2">
            {{Form::submit('削除', ['name' => 'deleteEmployee'])}}
        </div>
    </div>
    <div class="row">
        <div class="col-xs-1">
            {{Form::label('new_name', '新担当者名')}}
        </div>
        <div class="col-xs-3">
            {{Form::text('new_name', '新担当者名', ['class' => 'form-control'])}}
        </div>
        <div class="col-xs-2">
            {{Form::submit('更新', ['name' => 'updateEmployee'])}}
        </div>
    </div>
   @stop
    <table class="table table-striped table-bordered table-hover table-condensed">
        <tr class="row">
            <td class="col-xs-3">担当者</td>
        </tr>
        @foreach($employees as $e)
        <tr class="row">
            <td class="col-xs-3">{{ $e->name }}</td>
        </tr>
        @endforeach
    </table>
