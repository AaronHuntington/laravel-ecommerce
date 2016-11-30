@extends('layouts.admin')

@section('content')

<div class="row">
	

	<div class="col-lg-12">
        <h1 class="page-header">Users Admin Home</h1>
    </div>

    <table class="table">
	    <thead>
	      	<tr>
		        <th>ID</th>
		        <th>Photo</th>
		        <th>Name</th>
		        <th>Email</th>
		        <th>Role</th>
		        <th>Status</th>
		        <th>Created</th>
		        <th>Updated</th>
	      	</tr>
	    </thead>
	    <tbody>
	    	@if($users)
	    		@foreach($users as $user)
	    	<tr>
	    		<td>{{$user->id}}</td>
	    		<td>
	    			<img height="50" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/250x250'}}">
	    		</td>
	    		<td>
	    			<a href="{{route('users.edit', $user->id, 'edit')}}">
	    				{{$user->name}}
	    			</a>
	    		</td>
	    		<td>{{$user->email}}</td>
	    		<td>{{$user->role ? $user->role->name : 'User has no role'}}</td>
	    		<td>{{$user->is_active == 1 ? 'Active' : 'Not Active' }}</td>
	    		<td>{{$user->created_at->diffForHumans()}}</td>
	    		<td>{{$user->updated_at->diffForHUmans()}}</td>
	    	</tr>
	    		@endforeach
	    	@endif
	    </tbody>
  	</table>


</div>
@endsection