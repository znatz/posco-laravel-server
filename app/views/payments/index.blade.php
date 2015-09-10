@extends('layout.autorefresh')
@section('contents')
    <table class="table table-bordered text-center">
        <thead>
        <tr class="row mark">
            <td class="col-md-4">UUID
            </td>
            <td class="col-md-1">価格
            </td>
            <td class="col-md-2">お支払い
            </td>
            <td class="col-md-1">お釣り
            </td>
            <td class="col-md-2">時間
            </td>
            <td class="col-md-2">精算担当
            </td>
        </tr>
        </thead>
        @foreach($payments as $d)
            <tr class="row">
                <td class="col-md-4">{{$d->uuid}}</td>
                <td class="col-md-1 text-right">{{ number_format($d->price) }}</td>
                <td class="col-md-2 text-right">{{ number_format($d->payment) }}</td>
                <td class="col-md-1 text-right">{{ number_format($d->changes) }}</td>
                <td class="col-md-2">{{$d->time}}</td>
                <td class="col-md-2">{{$d->employeeName}}</td>
            </tr>
        @endforeach
    </table>
@stop
@section('contents2')
    <div class="col-md-5"></div>
    <div class="col-md-2">
        {{--{{Form::open(['route'=>'dataFromIOs.clear', 'method'=>'post'])}}--}}
        {{--{{Form::submit('全記録をクリア',['class'=>'form-control btn-primary btn-block btn-md'])}}--}}
    </div>
    <div class="col-md-5"></div>
@stop
