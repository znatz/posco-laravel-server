@extends('layout.testing')
@section('contents')
    <div id="save" hidden>save</div>
    <video id="video" autoplay width="640" height="480"></video>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-2">
            <button id="capture" class="col-md-3 form-control btn-primary btn-md btn-block">判断</button>
        </div>
        <div class="col-md-2">
            <button id="stop" class="col-md-3 form-control btn-primary btn-md btn-block">stop</button>
        </div>
        <div class="col-md-4">
            {{Form::open(['method'=>'post', 'files'=>true])}}
            <div>
                {{Form::label('age', '年齢', ['class' => 'control-label'])}}
            </div>
            <div>
                {{Form::text('age', '', ['class' => 'form-control', 'readonly'=>'true'])}}
            </div>
            <div>
                {{Form::label('gender', '性別', ['class' => 'control-label'])}}
            </div>
            <div>
                {{Form::text('gender', '', ['class' => 'form-control', 'readonly'=>'true'])}}
            </div>
            <div>
                {{Form::label('glass', 'メガネ', ['class' => 'control-label'])}}
            </div>
            <div>
                {{Form::text('glass', '', ['class' => 'form-control','readonly'=>'true'])}}
            </div>
            {{Form::close()}}
        </div>
    </div>
    <br/>
    <div id="capture_images" style="display:none;">
        <img id="img" src="" width="320" height="240"/>
        <canvas id="canvas" width="320" height="240"></canvas>
    </div>
@stop
