@extends('layout.autorefresh')
@section('contents')
    <table class="table table-bordered text-center">
        <thead>
        <tr class="row">
            <td class="col-md-1">担当者ID</th>
            <td class="col-md-3">商品名</th>
            <td class="col-md-2">個数</th>
            <td class="col-md-3">時間</th>
        </tr>
        </thead>
        @foreach($datafromios as $d)
        <tr class="row">
            <td>{{$d->tanto}}</td>
            <td>{{$d->goodsTitle}}</td>
            <td>{{$d->kosu}}</td>
            <td>{{$d->time}}</td>
        </tr>
            @endforeach
    </table>
    @stop
@section('contents2')
    {{Form::open(['route'=>'dataFromIOs.clear', 'method'=>'post'])}}
    {{Form::submit('記録をクリア')}}
    @stop