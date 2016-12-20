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
            <h1 class="page-header">Manufacturer List &nbsp&nbsp&nbsp<a class="btn btn-default" href="{{url('/admin/manufacturers/create')}}" role="button">Create MFG</a></h1>
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
                @foreach($manufacturers as $manufacturer)
                    <tr>
                        <td>
                            {{$manufacturer->id}}
                            <br>
                            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminManufacturerController@destroy', $manufacturer->id], 'onsubmit' => 'return confirmDelete()']) !!}
                                <div class="form-group">
                                    {!! Form::submit('Delete', ['class'=>'']) !!}
                                </div>
                            {!! Form::close() !!}
                        </td>
                        <td>
                            <a href="{{route('manufacturers.edit', $manufacturer->id)}}">
                                {{$manufacturer->name}}
                            </a>
                        </td>
                        <td>{{$manufacturer->created_at->diffForHumans()}}</td>
                        <td>{{$manufacturer->updated_at->diffForHumans()}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection