@extends('layouts.app') 

@section('content')
<div class="container">
	<div class="row">
		<table class="table table-responsive" id="example">
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
@endsection;