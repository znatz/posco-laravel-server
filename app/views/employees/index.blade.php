@extends('layout.layout')
@section('contents')
    {{Form::open(['route'=>'employees.store', 'method'=>'post'])}}
    <div class="row form-group">
        <div class="col-md-4">
            {{Form::label('name', '担当者名', ['class' => 'control-label'])}}
        </div>
        <div class="col-md-7">
            {{Form::text('name', show_if_exists($selectedEmployee->name), ['class' => 'form-control'])}}
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-4">
            {{Form::submit('登録', ['name' => 'createEmployee', 'class'=>'form-control btn-primary btn-md btn-block'])}}
        </div>

        <div class="col-md-4">
            {{Form::submit('削除', ['name' => 'deleteEmployee', 'class'=>'form-control btn-primary btn-md btn-block'])}}
        </div>
    </div>

    <div class="row form-group">
        <div class="col-md-4">
            {{Form::label('new_name', '新担当者名',['class'=>'control-label'])}}
        </div>
        <div class="col-md-7">
            {{Form::text('new_name', '', ['class' => 'form-control'])}}
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-4">
            {{Form::submit('更新', ['name' => 'updateEmployee', 'class'=>'form-control btn-primary btn-md btn-block'])}}
        </div>
    </div>
    {{Form::close()}}
    <div class="row">
        <div class="col-md-7">
            {{Form::open(['route'=>'employees.index', 'method'=>'get'])}}
            <table class="table table-striped table-bordered table-hover table-condensed">
                <tr class="row text-center">
                    <td class="mark col-md-4">
                        選択
                    </td>
                    <td class="mark col-md-9">
                        登録済み担当者
                    </td>
                </tr>
                @foreach($employees as $e)
                    <tr class="row text-center">
                        <td> {{Form::radio('selectedEmployee', $e->id,$e->id == $selectedEmployee->id, ['onclick' => 'javascript:submit()' ] )}}</td>
                        <td>{{ $e->name }}</td>
                    </tr>
                @endforeach
            </table>
            {{Form::submit('Select Employee', ['name' => 'targetEmployee', 'style'=>'display:none'])}}
            {{Form::close()}}
        </div>
    </div>
@stop
@section('contents2')
    {{Form::open(['route'=>'categories.store', 'method'=>'post'])}}
    <div class="row form-group">
        <div class="col-md-4">
            {{Form::label('Bumon', '部門名', ['class' => 'control-label'])}}
        </div>
        <div class="col-md-7">
            {{Form::text('Bumon', show_if_exists($selectedCategory->Bumon), ['class' => 'form-control'])}}
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-4">
            {{Form::submit('登録', ['name' => 'createCategory', 'class'=>'form-control btn-primary btn-md btn-block'])}}
        </div>

        <div class="col-md-4">
            {{Form::submit('削除', ['name' => 'deleteCategory', 'class'=>'form-control btn-primary btn-md btn-block'])}}
        </div>
    </div>

    <div class="row form-group">
        <div class="col-md-4">
            {{Form::label('new_categoryName', '新部門名',['class'=>'control-label'])}}
        </div>
        <div class="col-md-7">
            {{Form::text('new_categoryName', '', ['class' => 'form-control'])}}
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-4">
            {{Form::submit('更新', ['name' => 'updateCategory', 'class'=>'form-control btn-primary btn-md btn-block'])}}
        </div>
    </div>
    {{Form::close()}}
    <div class="row">
        <div class="col-md-6">
            {{Form::open(['route'=>'employees.index', 'method'=>'get'])}}
            <table class="table table-striped table-bordered table-hover table-condensed">
                <tr class="row text-center">
                    <td class="mark col-md-4">
                        選択
                    </td>
                    <td class="mark col-md-9">
                        登録済み部門
                    </td>
                </tr>
                @foreach($categories as $c)
                    <tr class="row text-center">
                        <td> {{Form::radio('selectedCategory', $c->id,$c->id == $selectedCategory->id, ['onclick' => 'javascript:submit()' ] )}}</td>
                        <td>{{ $c->Bumon }}</td>
                    </tr>
                @endforeach
            </table>
            {{Form::submit('Select Category', ['name' => 'targetCategory', 'style'=>'display:none'])}}
            {{Form::close()}}
        </div>
    </div>
@stop

@section('contents3')
    {{Form::open(['route'=>'shops.store', 'method'=>'post'])}}
    <div class="row form-group">
        <div class="col-md-4">
            {{Form::label('Tenpo', '店舗名', ['class' => 'control-label'])}}
        </div>
        <div class="col-md-7">
            {{Form::text('Tenpo', show_if_exists($selectedShop->Tenpo), ['class' => 'form-control'])}}
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-4">
            {{Form::submit('登録', ['name' => 'createShop', 'class'=>'form-control btn-primary btn-md btn-block'])}}
        </div>

        <div class="col-md-4">
            {{Form::submit('削除', ['name' => 'deleteShop', 'class'=>'form-control btn-primary btn-md btn-block'])}}
        </div>
    </div>

    <div class="row form-group">
        <div class="col-md-4">
            {{Form::label('new_shopName', '新店舗名',['class'=>'control-label'])}}
        </div>
        <div class="col-md-7">
            {{Form::text('new_shopName', '', ['class' => 'form-control'])}}
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-4">
            {{Form::submit('更新', ['name' => 'updateShop', 'class'=>'form-control btn-primary btn-md btn-block'])}}
        </div>
    </div>
    {{Form::close()}}
    <div class="row">
        <div class="col-md-6">
            {{Form::open(['route'=>'employees.index', 'method'=>'get'])}}
            <table class="table table-striped table-bordered table-hover table-condensed">
                <tr class="row text-center">
                    <td class="mark col-md-4">
                        選択
                    </td>
                    <td class="mark col-md-9">
                        登録済み店舗
                    </td>
                </tr>
                @foreach($shops as $s)
                    <tr class="row text-center">
                        <td> {{Form::radio('selectedShop', $s->id,$s->id == $selectedShop->id, ['onclick' => 'javascript:submit()' ] )}}</td>
                        <td>{{ $s->Tenpo }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@stop

