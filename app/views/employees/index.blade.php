@extends('layout.layout')
@section('contents')
    {{Form::open(['route'=>'employees.store', 'method'=>'post'])}}
    <div class="row form-group">
        <div class="col-xs-2">
            {{Form::label('name', '担当者名', ['class' => 'control-label'])}}
        </div>
        <div class="col-xs-4">
            {{Form::text('name', '担当者名', ['class' => 'form-control'])}}
        </div>
        <div class="col-xs-2">
            {{Form::submit('登録', ['name' => 'createEmployee', 'class'=>'form-control btn-primary btn-md btn-block'])}}
        </div>
        <div class="col-xs-2">
            {{Form::submit('削除', ['name' => 'deleteEmployee', 'class'=>'form-control btn-primary btn-md btn-block'])}}
        </div>
    </div>
    <div class="row form-group">
        <div class="col-xs-2">
            {{Form::label('new_name', '新担当者名',['class'=>'control-label'])}}
        </div>
        <div class="col-xs-4">
            {{Form::text('new_name', '新担当者名', ['class' => 'form-control'])}}
        </div>
        <div class="col-xs-2">
            {{Form::submit('更新', ['name' => 'updateEmployee', 'class'=>'form-control btn-primary btn-md btn-block'])}}
        </div>
        {{Form::close()}}
    </div>
@stop
@section('contents2')
    <table class="table table-striped table-bordered table-hover table-condensed">
        <tr class="row">
            <th>
                登録済み担当者
            </th>
        </tr>
        @foreach($employees as $e)
            <tr class="row text-center">
                <td>{{ $e->name }}</td>
            </tr>
        @endforeach
    </table>
@stop

@section('contents3')
    {{Form::open(['route'=>'employees.store', 'method'=>'post', 'files'=>true])}}
    <div>
        {{Form::label('title', '商品名', ['class' => 'control-label'])}}
    </div>
    <div>
        {{Form::text('title', '商品名', ['class' => 'form-control'])}}
    </div>
    <div>
        {{Form::label('price', '価格',['class'=>'control-label'])}}
    </div>
    <div>
        {{Form::text('price', '価格', ['class' => 'form-control'])}}
    </div>
    <div>
        {{Form::label('genka', '原価',['class'=>'control-label'])}}
    </div>
    <div>
        {{Form::text('genka', '原価', ['class' => 'form-control'])}}
    </div>
    <div>
        {{Form::label('Bumon', '部門',['class'=>'control-label'])}}
    </div>
    <div>
        {{Form::text('Bumon', '部門', ['class' => 'form-control'])}}
    </div>
    <div>
        {{Form::label('Kosu', '個数',['class'=>'control-label'])}}
    </div>
    <div>
        {{Form::text('Kosu', '個数', ['class' => 'form-control'])}}
    </div>
    <div>
        {{Form::label('contents', '写真',['class'=>'control-label'])}}
    </div>
    <div>
        {{Form::file('contents')}}
    </div>
    <div>
        {{Form::submit('登録', ['name' => 'createItem', 'class'=>'form-control btn-primary btn-md btn-block'])}}
    </div>
    {{Form::close()}}
@stop

@section('contents4')
    <? $items = Item::all(); ?>
    <table class="table table-striped table-bordered table-hover table-condensed">
        <tr class="row">
            <th>商品名</th>
            <th>価格</th>
            <th>原価</th>
            <th>部門</th>
            <th>在庫</th>
        </tr>
        @foreach($items as $item)
            <tr class="row">
                <td>{{$item->title}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->genka}}</td>
                <td>{{$item->Bumon}}</td>
                <td>{{$item->Kosu}}</td>
                <td class="col-xs-1"><img src='./item/{{$item->id}}'} class="img-responsive"/></td>
            </tr>
        @endforeach
    </table>
@stop
