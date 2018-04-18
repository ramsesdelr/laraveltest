@extends('layouts.app') 

@section('content')
<div class="container">
	@if(Auth::user()->is_admin == 1)
	<div align="right">
		<a class="btn btn-info" href="types/create">Add New</a>
	</div>
	@endif
	<div class="row">
		<table  class="table table-responsive table-striped table-bordered" id="example">
			<caption>List of Types</caption>
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Name</th>
				</tr>
			</thead>
			<tbody>
                @foreach($types as $type)
				<tr>
					<th scope="row"> {{$type->id}} </th>
					<td> <a href="types/{{$type->id }}/edit/"> {{$type->name}} </a> </td>

				</tr>
                @endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection