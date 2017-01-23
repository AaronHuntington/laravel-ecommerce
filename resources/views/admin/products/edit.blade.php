@extends('layouts.admin')
@section('content')

    <section class="row">

        <div class="col-lg-12">
            <h1 class="page-header">Edit Product</h1>
        </div>

        <div class="col-md-4 col-lg-4">
            <img height="300"src="{{URL::to($img_filePath.$product->model."/".$product->model.'.jpg')}}">
        </div>
        <div class="col-md-8 col-lg-8">
            {!! Form::model($product, ['method'=>'PATCH', 'action'=>['AdminProductsController@update', $product->id], 'files'=>true]) !!}
                <div class="form-group">
                    {!! Form::label('model', 'Model: DO NOT CHANGE MODEL') !!}
                    {!! Form::text('model', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('title', 'Title:') !!}
                    {!! Form::text('title', null, ['class'=>'form-control']) !!}
                </div>

                <div id="" class="form-group">
                    {!! Form::label('content', 'Content:') !!}
                    {!! Form::text('content', null, ['class'=>'form-control']) !!}
                </div>

                <div id="" class="form-group">
                    {!! Form::label('price', 'Price:') !!}
                    {!! Form::text('price', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Edit Product', ['class'=>'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </section>
@endsection