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
			<input type="file" id="file" name="logo" class="custom-file-input">
            <input type="hidden" name="id" value="{{ $vendor->id }}" >
           <button type="submit" class="btn btn-primary">Update</button>
		</form>
	</div>
</div>
@endsection