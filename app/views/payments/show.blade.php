@extends('layout.prelogin')
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
            <td class="col-md-2">清算担当
            </td>
        </tr>
        </thead>
            <tr class="row">
                <td class="col-md-4">{{$payment->uuid}}</td>
                <td class="col-md-1 text-right">{{ number_format($payment->price) }}</td>
                <td class="col-md-2 text-right">{{ number_format($payment->payment) }}</td>
                <td class="col-md-1 text-right">{{ number_format($payment->changes) }}</td>
                <td class="col-md-2">{{$payment->time}}</td>
                <td class="col-md-2">{{$payment->employeeName}}</td>
            </tr>
    </table>
@stop
