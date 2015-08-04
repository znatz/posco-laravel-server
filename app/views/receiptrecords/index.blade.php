@extends('layout.autorefresh')
@section('contents')
    <table class="table table-bordered text-center">
        <thead>
        <tr class="row mark">
            <td class="col-md-1">担当者
            </td>
            <td class="col-md-1">テーブル
            </td>
            <td class="col-md-1">レシート
            </td>
            <td class="col-md-3">商品名
            </td>
            <td class="col-md-1">価格
            </td>
            <td class="col-md-1">個数
            </td>
            <td class="col-md-2">注文時間
            </td>
            <td class="col-md-2">状態
            </td>
        </tr>
        </thead>
        @foreach($receiptrecords as $r)
            <tr class="row">
                <td class="col-md-1">{{Employee::find($r->tantoID)->name}}</td>
                <td class="col-md-1">{{$r->tableNO}}</td>
                <td class="col-md-1">{{$r->receiptNo}}</td>
                <td class="col-md-3">{{$r->goodsTitle}}</td>
                <td class="col-md-1">{{$r->price}}</td>
                <td class="col-md-1">{{$r->kosu}}</td>
                <td class="col-md-2">{{$r->orderTime}}</td>
                <td class="col-md-2">{{$r->progress}}</td>
                </td>
            </tr>
        @endforeach
    </table>
@stop
@section('contents2')
    <div class="col-md-5"></div>
    <div class="col-md-2">
        {{--{{Form::open(['route'=>'dataFromIOs.clear', 'method'=>'post'])}}--}}
        {{--{{Form::submit('�S�L�^���N���A',['class'=>'form-control btn-primary btn-block btn-md'])}}--}}
    </div>
    <div class="col-md-5"></div>
@stop
