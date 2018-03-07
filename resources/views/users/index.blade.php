@extends('layouts.app') 

@section('content')
<div class="container">

	@if(session('message'))
	<div class="alert alert-success">
		{{session('message')}}
	</div>
	@endif
	<div align="right">
		<!-- <a class="btn btn-info" href="users/create">Add New</a> -->
	</div>

	<div class="row">
		<table class="table table-bordered">
			<caption>List of Users</caption>
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Name</th>
					<th scope="col">Email</th>
					<th scope="col">Admin</th>
					<th scope="col">Active</th>
				</tr>
			</thead>
			<tbody>
                @foreach($users as $user)
				<tr>
					<th scope="row"> {{$user->id}} </th>
					<td> <a href="users/{{$user->id }}/edit/"> {{$user->name}} </a> </td>
					<td>  {{$user->email}} </td>
					<td align="center">  
						<a id="user-role-{{$user->id}}"  class="btn btn-info" onclick="updateRole({{$user->id}})">
							{{$user->is_admin == 1 ? 'Admin' : 'Client'}}
						  </a> 
					</td>
					<td align="center">  
					<a id="user-active-{{$user->id}}" class="btn btn-info"  onclick="updateIsActive({{$user->id}})">{{$user->is_active == 1 ? 'Active' : 'Inactive'}}
					</a>
					</td>
				</tr>
                @endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection;

