<h4>3 Most Recent Items </h4>
	<ul>
		@foreach ($latestItems as $item)
		<li> {{ $item->name }}</li>
		@endforeach
	</ul>