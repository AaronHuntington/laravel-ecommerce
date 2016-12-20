@extends('layouts.admin')
@section('content')

    <section class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Billboard</h1>
        </div>
        {!! Form::model($manufacturer, ['method'=>'PATCH', 'action'=>['AdminManufacturerController@update', $manufacturer->id], 'files'=>true]) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Edit Manufacturer', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    </section>
@endsection