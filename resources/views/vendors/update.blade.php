@extends('layouts.app') 

@section('content')
<div class="container">
	<div class="row">
		<form action="/vendors/update" method="POST" enctype="multipart/form-data">
            @include('errors')
             {{ csrf_field() }}
			<div class="form-group">
				<label for="vendor">Vendor Name</label>
				<input type="text" name="name" value="{{$vendor->name}}" class="form-control" id="vendor" required>
			</div>
				@if(file_exists('storage/'. $vendor->logo ) && $vendor->logo != null)
				<img height="100" src="{{ asset('/storage/'. $vendor->logo ) }}"> 
				@endif
				<br/>
			<input type="file" id="file" name="logo" class="custom-file-input">
            <input type="hidden" name="id" value="{{ $vendor->id }}" >
			<a class="btn btn-primary" href="/vendors" role="button">Back</a>

           <button type="submit" class="btn btn-primary">Update</button>
		</form>
	</div>
</div>
@endsection