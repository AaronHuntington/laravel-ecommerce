@extends('layouts.admin')
@section('content')
    <script>
        function confirmDelete(){
            var x = confirm("Are you sure you want to delete?");
            if (x)
                return true;
            else
                return false;
        }
    </script>
    <section class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Category List &nbsp&nbsp&nbsp<a class="btn btn-default" href="{{url('/admin/categories/create')}}" role="button">Create Category</a></h1>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Created</th>
                    <th>Updated</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>
                            {{$category->id}}
                            <br>
                            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminCategoriesController@destroy', $category->id], 'onsubmit' => 'return confirmDelete()']) !!}
                                <div class="form-group">
                                    {!! Form::submit('Delete', ['class'=>'']) !!}
                                </div>
                            {!! Form::close() !!}
                        </td>
                        <td>
                            <a href="{{route('categories.edit', $category->id)}}">
                                {{$category->name}}
                            </a>
                        </td>
                        <td>{{$category->created_at->diffForHumans()}}</td>
                        <td>{{$category->updated_at->diffForHumans()}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection