@extends('layouts.admin')
@section('content')

    <section class="row">

        <div class="col-lg-12">
            <h1 class="page-header">Enter Product</h1>
        </div>

        @include('includes.form_error')

        {!! Form::open(['method'=>'POST', 'action'=>'AdminProductsController@store', 'files'=>true]) !!}
            <div id="" class="form-group">
                {!! Form::label('photo', 'Photo:') !!}
                {!! Form::file('photo', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('model', 'Model:') !!}
                {!! Form::text('model', null, ['class'=>'form-control'], ['required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('title', 'Title:') !!}
                {!! Form::text('title', null, ['class'=>'form-control'], ['required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('content', 'Content:') !!}
                {!! Form::text('content', null, ['class'=>'form-control'], ['required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('price', 'Price:') !!}
                {!! Form::text('price', null, ['class'=>'form-control'], ['required']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Enter Product', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    </section>
@endsection