@extends('layouts.app') 

@section('content')
<div class="container">
	<div class="row">
		<form action="/types/store" method="POST" enctype="multipart/form-data">
            @include('errors')
             {{ csrf_field() }}
			<div class="form-group">
				<label for="type">Type Name</label>
				<input type="text" name="name"  class="form-control" id="vendor" required>
			</div>
					<a class="btn btn-primary" href="/types" role="button">Back</a>

           <button type="submit" class="btn btn-primary">Create</button>
		</form>
	</div>
</div>
@endsection