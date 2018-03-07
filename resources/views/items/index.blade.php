@extends('layouts.app') 
@section('content')
<div class="container">
	@if(Auth::user()->is_admin == 0)
	<div align="right">
		<a class="btn btn-info" href="items/create">Add New</a>
	</div>
	@endif
	<div class="row">
		<table class="table table-responsive" id="example">
			<caption>List of Items</caption>
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Name</th>
					<th scope="col">Photo</th>
					<th scope="col">Color</th>
					<th scope="col">Price</th>
				</tr>
			</thead>
			<tbody>
				@foreach($items as $item)
				<tr>
					<th scope="row"> {{$item->id}} </th>
					<td>
						<a href="items/edit/{{$item->id }}"> {{$item->name}} </a>
					</td>
					<td>
						@if(file_exists('storage/'. $item->photo ) && $item->photo != null)
						<img height="100" src="{{ asset('/storage/'. $item->photo ) }}"> @endif
					</td>
					<td>{{ $item->color }}</td>
					<td>{{ $item->price }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{{--  {{$items->links()}}  --}}
	</div>
</div>
@endsection;