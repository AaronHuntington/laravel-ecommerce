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
            <h1 class="page-header">Products List &nbsp&nbsp&nbsp<a class="btn btn-default" href="{{url('/admin/products/create')}}" role="button">Create Product</a></h1>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Model</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Created</th>
                    <th>Updated</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>
                            {{$product->id}}
                            <br>
                            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminProductsController@destroy', $product->id], 'onsubmit' => 'return confirmDelete()']) !!}
                                <div class="form-group">
                                    {!! Form::submit('Delete', ['class'=>'']) !!}
                                </div>
                            {!! Form::close() !!}
                        </td>
                        <td>
                            <a href="{{route('products.edit', $product->id)}}">
                                {{$product->model}}
                            </a>
                            <br>
                            <img height="100" src="{{URL::to($img_filePath.$product->model."/".$product->model.'.jpg')}}">
                        </td>
                        <td>{{$product->title}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->created_at}}</td>
                        <td>{{$product->updated_at}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection
