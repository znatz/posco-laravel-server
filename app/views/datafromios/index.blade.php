@extends('layout.autorefresh')
@section('contents')
    <table>
        @foreach($datafromios as $d)
        <tr>
            <td>{{$d->id}}</td>
            <td>{{$d->tanto}}</td>
            <td>{{$d->goodsTitle}}</td>
            <td>{{$d->kosu}}</td>
            <td>{{$d->time}}</td>
            <td>{{$d->created_at}}</td>
            <td>{{$d->updated_at}}</td>
        </tr>
            @endforeach
    </table>
    @stop