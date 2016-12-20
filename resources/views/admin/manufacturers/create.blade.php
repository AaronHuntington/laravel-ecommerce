@extends('layouts.admin')
@section('content')

    <section class="row">

        <div class="col-lg-12">
            <h1 class="page-header">Create Billboard</h1>
        </div>

        @include('includes.form_error')

        {!! Form::open(['method'=>'POST', 'action'=>'AdminManufacturerController@store', 'files'=>true]) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control'], ['required']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Create Billboard', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    </section>
@endsection