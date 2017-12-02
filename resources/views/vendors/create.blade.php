@extends('layouts.app') 

@section('content')
<div class="container">
	<div class="row">
		<form action="/vendors/store" method="POST" enctype="multipart/form-data">
            @include('errors')
             {{ csrf_field() }}
			<div class="form-group">
				<label for="vendor">Vendor Name</label>
				<input type="text" name="name"  class="form-control" id="vendor" required>
			</div>
			<div class="form-group">
				<label for="vendor">Photo</label>
				<input type="file" id="file" name="logo" class="custom-file-input">
			</div>
           <button type="submit" class="btn btn-primary">Create</button>
		</form>
	</div>
</div>
@endsection