@extends('layouts.app') 

@section('content')
<div class="container">
	<div class="row">
		<table class="table table-responsive">
			<caption>List of Vendors</caption>
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Name</th>
				</tr>
			</thead>
			<tbody>
                @foreach($vendors as $vendor)
				<tr>
					<th scope="row"> {{$vendor->id}} </th>
					<td> <a href="vendors/{{$vendor->id }}/edit/"> {{$vendor->name}} </a> </td>

				</tr>
                @endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection;