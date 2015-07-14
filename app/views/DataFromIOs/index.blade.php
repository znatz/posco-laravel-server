@extends('layout.layout');
@section('contents')
    @foreach($datafromios' as $d)
        <tr>
            <td>$d->id</td>
            <td>$d->tanto</td>
            <td>$d->goodsTitle</td>
            <td>$d->kosu</td>
            <td>$d->time</td>
            <td>$d->receiptNo</td>
            <td>$d->created_at</td>
            <td>$d->updated_at</td>
        </tr>
    @endforeach
    @stop