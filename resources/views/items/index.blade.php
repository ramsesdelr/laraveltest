@extends('layouts.app') 

@section('content')
<div class="container">
	<div class="row">
		<table class="table table-responsive">
			<caption>List of users</caption>
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Name</th>
					<th scope="col">Color</th>
					<th scope="col">Price</th>
				</tr>
			</thead>
			<tbody>
                @foreach($items as $item)
				<tr>
					<th scope="row"> {{$item->id}} </th>
					<td> <a href="items/edit/{{$item->id }}"> {{$item->name}} </a> </td>
					<td>{{ $item->color }}</td>
					<td>{{ $item->price }}</td>
				</tr>
                @endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection;