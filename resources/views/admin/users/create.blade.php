@extends('layouts.admin')

@section('content')

<div class="row">
    

    <div class="col-lg-12">
        <h1 class="page-header">Create User</h1>
    </div>

    {!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store']) !!}
        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class'=>'form-control']) !!}
        </div>
    
        <div class="form-group">
            {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}

</div>
@endsection