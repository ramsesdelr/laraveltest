@extends('layouts.app') 

@section('content')
<div class="container">
	<div class="row">
		<form action="/types/update" method="POST" enctype="multipart/form-data">
            @include('errors')
             {{ csrf_field() }}
			<div class="form-group">
				<label for="type">Type Name</label>
				<input type="text" name="name" value="{{$type->name}}" class="form-control" id="type" required>
			</div>
            <input type="hidden" name="id" value="{{ $type->id }}" >
			<a class="btn btn-primary" href="/types" role="button">Back</a>
           <button type="submit" class="btn btn-primary">Update</button>
		</form>
	</div>
</div>
@endsection