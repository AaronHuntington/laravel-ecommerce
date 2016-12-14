@extends('layouts.admin')
@section('content')

    <section class="row">

        <div class="col-lg-12">
            <h1 class="page-header">Edit Billboard</h1>
        </div>

        {!! Form::model($billboard, ['method'=>'PATCH', 'action'=>['AdminHomeBillboardController@update', $billboard->id], 'files'=>true]) !!}
            <div class="form-group">
                {!! Form::label('content', 'Name:') !!}
                {!! Form::text('content', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('link', 'Link:') !!}
                {!! Form::text('link', null, ['class'=>'form-control']) !!}
            </div>

            <div id="" class="form-group">
                {!! Form::label('is_active', 'Status:') !!}
                {!! Form::select('is_active',array(1=>'Active', 0=>'Not Active'), null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Edit Billboard', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    </section>
@endsection