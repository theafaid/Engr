@extends('admin.layouts.app')
@section('content')
	<div class='card'>
		<div class='card-header'>Create a new post</div>
		<div class='card-body'>
			<form action="{{ route('categories.update', $category->slug) }}" method="POST" enctype="multipart/form-data">
				@csrf
				{{ method_field('PATCH') }}
				<div class='form-group'>
					Category Name
					<input type="text" class='form-control' placeholder="Name" name='name' value="{{ $category->name }}">
				</div>
				<div class='form-group'>
					<input type="submit" class='form-control btn btn-primary' value="Edit Category">
				</div>
			</form>
		</div>
	</div>
@endsection