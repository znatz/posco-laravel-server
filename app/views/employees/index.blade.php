@extends('layout.layout')
@section('contents')
    {{Form::open(['route'=>'employees.store', 'method'=>'post'])}}
    <div class="row form-group">
        <div class="col-xs-4">
            {{Form::label('name', '担当者名', ['class' => 'control-label'])}}
        </div>
        <div class="col-xs-7">
            {{Form::text('name', '', ['class' => 'form-control'])}}
        </div>
    </div>
    <div class="row form-group">
        <div class="col-xs-4">
            {{Form::submit('登録', ['name' => 'createEmployee', 'class'=>'form-control btn-primary btn-md btn-block'])}}
        </div>

        <div class="col-xs-4">
            {{Form::submit('削除', ['name' => 'deleteEmployee', 'class'=>'form-control btn-primary btn-md btn-block'])}}
        </div>
    </div>

    <div class="row form-group">
        <div class="col-xs-4">
            {{Form::label('new_name', '新担当者名',['class'=>'control-label'])}}
        </div>
        <div class="col-xs-7">
            {{Form::text('new_name', '', ['class' => 'form-control'])}}
        </div>
    </div>
    <div class="row form-group">
        <div class="col-xs-4">
            {{Form::submit('更新', ['name' => 'updateEmployee', 'class'=>'form-control btn-primary btn-md btn-block'])}}
        </div>
    </div>
    {{Form::close()}}
    <div class="row">
        <div class="col-xs-6">
            <table class="table table-striped table-bordered table-hover table-condensed">
                <tr class="row text-center">
                    <td class="mark">
                        登録済み担当者
                    </td>
                </tr>
                @foreach($employees as $e)
                    <tr class="row text-center">
                        <td>{{ $e->name }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@stop
@section('contents2')
    {{Form::open(['route'=>'employees.store', 'method'=>'post'])}}
    <div class="row form-group">
        <div class="col-xs-4">
            {{Form::label('Bumon', '部門名', ['class' => 'control-label'])}}
        </div>
        <div class="col-xs-7">
            {{Form::text('Bumon', '', ['class' => 'form-control'])}}
        </div>
    </div>
    <div class="row form-group">
        <div class="col-xs-4">
            {{Form::submit('登録', ['name' => 'createCategory', 'class'=>'form-control btn-primary btn-md btn-block'])}}
        </div>

        <div class="col-xs-4">
            {{Form::submit('削除', ['name' => 'deleteCategory', 'class'=>'form-control btn-primary btn-md btn-block'])}}
        </div>
    </div>

    <div class="row form-group">
        <div class="col-xs-4">
            {{Form::label('new_categoryName', '新部門名',['class'=>'control-label'])}}
        </div>
        <div class="col-xs-7">
            {{Form::text('new_categoryName', '', ['class' => 'form-control'])}}
        </div>
    </div>
    <div class="row form-group">
        <div class="col-xs-4">
            {{Form::submit('更新', ['name' => 'updateCategory', 'class'=>'form-control btn-primary btn-md btn-block'])}}
        </div>
    </div>
    {{Form::close()}}
    <div class="row">
        <div class="col-xs-6">
            <table class="table table-striped table-bordered table-hover table-condensed">
                <tr class="row text-center">
                    <td class="mark">
                        登録済み部門
                    </td>
                </tr>
                @foreach($categories as $c)
                    <tr class="row text-center">
                        <td>{{ $c->Bumon }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@stop

@section('contents3')
    {{Form::open(['route'=>'employees.store', 'method'=>'post'])}}
    <div class="row form-group">
        <div class="col-xs-4">
            {{Form::label('Tenpo', '店舗名', ['class' => 'control-label'])}}
        </div>
        <div class="col-xs-7">
            {{Form::text('Tenpo', '', ['class' => 'form-control'])}}
        </div>
    </div>
    <div class="row form-group">
        <div class="col-xs-4">
            {{Form::submit('登録', ['name' => 'createShop', 'class'=>'form-control btn-primary btn-md btn-block'])}}
        </div>

        <div class="col-xs-4">
            {{Form::submit('削除', ['name' => 'deleteShop', 'class'=>'form-control btn-primary btn-md btn-block'])}}
        </div>
    </div>

    <div class="row form-group">
        <div class="col-xs-4">
            {{Form::label('new_shopName', '新店舗名',['class'=>'control-label'])}}
        </div>
        <div class="col-xs-7">
            {{Form::text('new_shopName', '', ['class' => 'form-control'])}}
        </div>
    </div>
    <div class="row form-group">
        <div class="col-xs-4">
            {{Form::submit('更新', ['name' => 'updateShop', 'class'=>'form-control btn-primary btn-md btn-block'])}}
        </div>
    </div>
    {{Form::close()}}
    <div class="row">
        <div class="col-xs-6">
            <table class="table table-striped table-bordered table-hover table-condensed">
                <tr class="row text-center">
                    <td class="mark">
                        登録済み店舗
                    </td>
                </tr>
                @foreach($shops as $s)
                    <tr class="row text-center">
                        <td>{{ $s->Tenpo }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@stop



@section('contents4')
    <? foreach ($categories as $c) { $category_pairs[$c->id] = $c->Bumon;} ?>
    {{Form::open(['route'=>'employees.store', 'method'=>'post', 'files'=>true])}}
    <div>
        {{Form::label('title', '商品名', ['class' => 'control-label'])}}
    </div>
    <div>
        {{Form::text('title', $item->title, ['class' => 'form-control'])}}
    </div>
    <div>
        {{Form::label('price', '価格',['class'=>'control-label'])}}
    </div>
    <div>
        {{Form::text('price', $item->price, ['class' => 'form-control'])}}
    </div>
    <div>
        {{Form::label('genka', '原価',['class'=>'control-label'])}}
    </div>
    <div>
        {{Form::text('genka', $item->genka, ['class' => 'form-control'])}}
    </div>
    <div>
        {{Form::label('Bumon', '部門',['class'=>'control-label'])}}
    </div>
    <div>
        {{Form::select('Bumon', $category_pairs, $item->Bumon, ['class'=>'form-control'])}}
    </div>
    <div>
        {{Form::label('Kosu', '個数',['class'=>'control-label'])}}
    </div>
    <div>
        {{Form::text('Kosu', $item->Kosu, ['class' => 'form-control'])}}
    </div>
    <div>
        {{Form::label('contents', '写真',['class'=>'control-label'])}}
    </div>
    <div>
        {{Form::file('upload',['class'=>'form-control'])}}
    </div>
    <div class="well-sm">
        {{Form::submit('登録', ['name' => 'createItem', 'class'=>'form-control btn-primary btn-md btn-block'])}}
    </div>
    <div class="well-sm">
        {{Form::submit('更新', ['name' => 'updateItem', 'class'=>'form-control btn-primary btn-md btn-block'])}}
    </div>
    <div class="well-sm">
        {{Form::submit('削除', ['name' => 'deleteItem', 'class'=>'form-control btn-primary btn-md btn-block'])}}
        {{Form::text('idItem', $item->id, ['style'=>'display:none'])}}
    </div>
    {{Form::close()}}
@stop

@section('contents5')
    <? $items = Item::all(); ?>
    {{Form::open(['route'=>'employees.index', 'method'=>'post', 'id'=>"item_form"])}}
    <table class="table table-striped table-bordered table-hover table-condensed" data-toggle="table"
           data-locale="ja-JP">
        <thead>
        <tr class="row text-center mark">
            <td>選択</td>
            <td>商品名</td>
            <td>価格</td>
            <td>原価</td>
            <td>部門</td>
            <td>在庫</td>
            <td>写真</td>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr class="row">
                <td class="col-md-1 text-center">{{Form::radio('selectedItem',$item->id, false, ['id'=>'selectedItem'])}}</td>
                <td>{{$item->title}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->genka}}</td>
                <td>{{$item->Bumon}}</td>
                <td>{{$item->Kosu}}</td>
                <td class="col-xs-1"><img src='./item/{{$item->id}}' } class="img-responsive"/></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{Form::close()}}
@stop
