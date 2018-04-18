@extends('layouts.app')
 @section('content')
<div class="container">
	<div class="row">
		<form action="/items/update" method="POST" enctype="multipart/form-data">
			@include('errors') 
			{{ csrf_field() }}
			<div class="form-group">
				<label for="exampleFormControlInput1">Name</label>
				<input type="text" name="name" value="{{ $item->name }}" class="form-control" id="exampleFormControlInput1" placeholder="Your product name"
				 required>
			</div>
			<div class="form-group">
				<label for="exampleFormControlSelect1">Vendor</label>
				<select name="vendors_id" class="form-control" id="exampleFormControlSelect1" required>
					@foreach($vendors as $vendor)
					<option value="{{ $vendor->id }}" @php echo $item->vendors_id == $vendor->id ? 'selected' :'' @endphp >{{ $vendor->name }}</option>
					@endforeach
				</select>

			</div>
			<div class="form-group">
				<label for="exampleFormControlSelect1">Type</label>
				<select name="types_id" class="form-control" id="exampleFormControlSelect1">
					@foreach($types as $type)
					<option value="{{ $type->id }}" @php echo $item->types_id == $type->id ? 'selected' :'' @endphp>{{ $type->name }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="exampleFormControlInput1">SKU</label>
				<input type="text" name="sku" value="{{ $item->sku }}" class="form-control" id="exampleFormControlInput1" placeholder="Your product SKU"
				 required>
			</div>
			<div class="form-group row">
				<label for="price" class="col-sm-2 col-form-label">Price</label>
				<div class="col-sm-10">
					<input type="text" name="price" value="{{ $item->price }}" class="form-control" id="price" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="weight" class="col-sm-2 col-form-label">Weight</label>
				<div class="col-sm-10">
					<input type="text" name="weight" value="{{ $item->weight }}" class="form-control" id="weight">
				</div>
			</div>
			<div class="form-group row">
				<label for="color" class="col-sm-2 col-form-label">Color</label>
				<div class="col-sm-10">
					<input type="text" name="color" value="{{ $item->color }}" class="form-control" id="color">
				</div>
			</div>

			<div class="form-group row">
				<label for="release_date" class="col-sm-6 col-form-label">Release Date</label>
				<div class="col-sm-6">
					<input type="date" name="release_date" value="{{ $item->release_date }}" class="form-control" id="release_date">
				</div>
			</div>
			<div class="form-group row">
				<label for="release_date" class="col-sm-2 col-form-label">Tags</label>
				<div class="col-sm-10">
					<input name="tags" placeholder="write some tags" value="{{ $item->tags }}">
				</div>
			</div>
			<div class="form-group row">
				<label class="custom-file">
					<label for="release_date" class="col-sm-6 col-form-label">Photo</label>
					@if(file_exists('storage/'. $item->photo ) && $item->photo != null)
					<img height="100" src="{{ asset('/storage/'. $item->photo ) }}"> @endif
					<div class="col-sm-4">
						<input type="file" id="file" name="photo" class="custom-file-input">
					</div>
					<span class="custom-file-control"></span>
				</label>
				<input type="hidden" name="id" value="{{ $item->id }}">

			</div>
			<div class="form-group row">
				<div class="col-sm-10"></div>
				<div class="col-sm-2">
					<a class="btn btn-primary" href="/items" role="button">Back</a>
					<button type="submit" class="btn btn-primary" id="update-item">Submit</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection