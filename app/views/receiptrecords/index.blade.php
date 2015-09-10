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
            <td class="col-md-2">商品名
            </td>
            <td class="col-md-1">価格
            </td>
            <td class="col-md-1">個数
            </td>
            <td class="col-md-1">支払い番号
            </td>
            <td class="col-md-2">注文時間
            </td>
            <td class="col-md-1">状態
            </td>
        </tr>
        </thead>
        @foreach($receiptrecords as $r)
            <tr class="row">
                <td class="col-md-1">{{Employee::find($r->tantoID)->name}}</td>
                <td class="col-md-1">{{$r->tableNO}}</td>
                <td class="col-md-1">{{$r->receiptNo}}</td>
                <td class="col-md-2">{{$r->goodsTitle}}</td>
                <td class="col-md-1">{{$r->price}}</td>
                <td class="col-md-1">{{$r->kosu}}</td>
                @if($r->payment_id == '0')
                    <td class="col-md-1">-</td>
                @else
                    <td class="col-md-1">{{link_to_action('payments.show', str_limit($r->payment_id, 5, '...'), $r->payment_id)}}</td>
                @endif
                <td class="col-md-2">{{$r->orderTime}}</td>
                @if($r->progress  == '支払い済み')
                    <td class="col-md-1 bg-info"><h6>{{$r->progress}}</h6></td>
                @elseif($r->progress == '提供済み')
                    <td class="col-md-1 bg-success"><h6>{{$r->progress}}</h6></td>
                @else
                    <td class="col-md-1 bg-warning"><h6>{{$r->progress}}</h6></td>
                @endif
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
