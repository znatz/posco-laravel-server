@extends('layout.autorefresh')
@section('contents')
    <table class="table table-bordered text-center">
        <thead>
        <tr class="row">
            <td class="col-md-1">担当者ID</th>
            <td class="col-md-3">商品名</th>
            <td class="col-md-1">個数</th>
            <td class="col-md-2">時間</th>
            <td class="col-md-2">処理</th>
        </tr>
        </thead>
        @foreach($datafromios as $d)
        <tr class="row">
            <td class="col-md-1">{{$d->tanto}}</td>
            <td class="col-md-3">{{$d->goodsTitle}}</td>
            <td class="col-md-1">{{$d->kosu}}</td>
            <td class="col-md-2">{{$d->time}}</td>
            <td class="col-md-2">{{Form::open(['route'=>'dataFromIOs.destroy', 'method'=>'DELETE'])}}
                {{Form::text('id', $d->id, ['style'=>'display:none'])}}
                {{Form::submit('削除', ['class' =>'btn btn-sm'])}}
                {{Form::close()}}
            </td>
        </tr>
            @endforeach
    </table>
    @stop
@section('contents2')
    {{Form::open(['route'=>'dataFromIOs.clear', 'method'=>'post'])}}
    {{Form::submit('記録をクリア')}}
    @stop