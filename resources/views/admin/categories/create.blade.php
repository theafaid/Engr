@extends('admin.layouts.app')
@section('content')
	<div class='card'>
	
		<div class='card-header'>Create a new post</div>
		<div class='card-body'>
			<form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class='form-group'>
					Category Name
					<input type="text" class='form-control' placeholder="Name" name='name'>
				</div>
				<div class='form-group'>
					<input type="submit" class='form-control btn btn-primary' value="Add Category">
				</div>
			</form>
		</div>
	</div>
@endsection