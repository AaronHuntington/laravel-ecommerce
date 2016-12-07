@extends('layouts.admin')
@section('content')

    <section class="row">

        <div class="col-lg-12">
            <h1 class="page-header">Home Page Billboard</h1>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Active</th>
                    <th>Order</th>
                    <th>Link</th>
                    <th>file_path</th>
                    <th>Created</th>
                    <th>Updated</th>
                </tr>
            </thead>
            <tbody>
                @foreach($billboards as $billboard)
                    <tr>
                        <td>{{$billboard->id}}</td>
                        <td>{{$billboard->is_active}}</td>
                        <td>{{$billboard->order}}</td>
                        <td>{{$billboard->link}}</td>
                        <td>{{$billboard->content}}</td>
                        <td>Create at Content</td>
                        <td>Updated at Content</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection