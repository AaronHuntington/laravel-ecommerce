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
            <h1 class="page-header">Home Page Billboard</h1>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Active</th>
                    <th>Order</th>
                    <th>Link</th>
                    <th>Created</th>
                    <th>Updated</th>
                </tr>
            </thead>
            <tbody>
                @foreach($billboards as $billboard)
                    <tr>
                        <td>
                            {{$billboard->id}}
                            <br>
                            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminHomeBillboardController@destroy', $billboard->id], 'onsubmit' => 'return confirmDelete()']) !!}
                                <div class="form-group">
                                    {!! Form::submit('Delete', ['class'=>'']) !!}
                                </div>
                            {!! Form::close() !!}
                        </td>
                        <td>
                            <a href="{{route('billboard.edit', $billboard->id)}}">
                                {{$billboard->content}}
                            </a>
                        </td>
                        <td>{{$billboard->is_active}}</td>
                        <td>{{$billboard->order}}</td>
                        <td>{{$billboard->link}}</td>
                        <td>{{$billboard->created_at->diffForHumans()}}</td>
                        <td>{{$billboard->updated_at->diffForHumans()}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection