@if(session()->has('success'))
	<div class='alert alert-success'>
		{{ session()->get('success') }}
	</div>
@endif

@if(session()->has('error'))
	<div class='alert alert-danger'>
		{{ session()->get('error') }}
	</div>
@endif

@if(count($errors))
	<h6>
			<div class='alert alert-danger'>
				@foreach($errors->all() as $err)
					<li>{{ $err }}</li>
				@endforeach
			</div>
	</h6>
@endif