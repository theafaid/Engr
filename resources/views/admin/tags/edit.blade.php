@extends('admin.layouts.app')
@section('content')
	<div class='card'>
		<div class='card-header'>Edit a tag</div>
		<div class='card-body'>
			<form action="{{ route('tags.update', $tag->name) }}" method="POST">
				@csrf
				{{ method_field('PATCH') }}
				<div class='form-group'>
					Category Name
					<input type="text" class='form-control' placeholder="Name" name='name' value="{{ $tag->name }}">
				</div>
				<div class='form-group'>
					<input type="submit" class='form-control btn btn-primary' value="Edit Tag">
				</div>
			</form>
		</div>
	</div>
@endsection