@extends('layouts.app') 

@section('content')
<div class="container">

	<div align="right">
		<a class="btn btn-info" href="users/create">Add New</a>
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
					<td>  {{$user->is_admin}} </td>
					<td>  {{$user->is_active}} </td>
				</tr>
                @endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection;