@extends('layouts.app')
 @section('content')
<div class="container">
	<div class="row">
		<form action="/users/store" method="POST" enctype="multipart/form-data">
			@include('errors') 
			{{ csrf_field() }}
			<div class="form-group">
				<label for="exampleFormControlInput1">Name</label>
				<input type="text" name="name" value="{{ $user->name }}" class="form-control" id="exampleFormControlInput1" placeholder="Your product name"
				 required>
			</div>
            <div class="form-group">
				<label for="exampleFormControlInput1">Email</label>
				<input type="text" name="email" value="{{ $user->email }}" class="form-control" id="exampleFormControlInput1" placeholder="email@example.com"
				 required>
			</div>
            <div class="form-group">
				<label for="exampleFormControlInput1">Password</label>
				<input type="password" name="password" class="form-control" id="password" placeholder="Your product name"
				 required>
			</div>
            <div class="form-group">
				<label for="exampleFormControlInput1">Re-type password</label>
				<input type="password" name="password_v" class="form-control" id="password_v" placeholder="Your product name"
				 required>
			</div>
	

			<div class="form-group row">
				<div class="col-sm-10"></div>
				<div class="col-sm-2">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection