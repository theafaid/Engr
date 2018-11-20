@extends('admin.layouts.app')
@section('content')
	<div class='card'>
	
		<div class='card-header'>Create a new tag</div>
		<div class='card-body'>
			<form action="{{ route('tags.store') }}" method="POST" >
				@csrf
				<div class='form-group'>
					Tag Name
					<input type="text" class='form-control' placeholder="Name" name='name'>
				</div>
				<div class='form-group'>
					<input type="submit" class='form-control btn btn-primary' value="Add Tag">
				</div>
			</form>
		</div>
	</div>
@endsection