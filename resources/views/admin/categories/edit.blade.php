@extends('layouts.admin')
@section('content')

    <section class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Billboard</h1>
        </div>
        {!! Form::model($category, ['method'=>'PATCH', 'action'=>['AdminCategoriesController@update', $category->id], 'files'=>true]) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Edit category', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    </section>
@endsection