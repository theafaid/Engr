@extends('admin.layouts.app')

@section('content')
	<h2>Published Posts</h2>

	@if(count($posts))
		<table class='table table-hovered table-bordered table-responsive'>
			<tr>
				<td>Title</td>
				<td>Image</td>
				<td>Category</td>
				<td>By</td>
				<td>At</td>
				<td>Edit</td>
				<td>Trash</td>
			</tr>

			@foreach($posts as $post)
			<tr>
				<td>{{ str_limit($post->title, 20) }}</td>
				<td>
					<img src="{{ $post->image() }}" width="50" height="50">
				</td>
				<td>{{ $post->category->name }}</td>
				<td>{{ $post->user->name }}</td>
				<td>{{ $post->created_at }}</td>
				
				<td>
					<a href="{{ route('posts.edit', $post->slug) }}" class='btn btn-primary'>
						Edit
					</a>
				</td>

				<td>
					<form action="{{ route('posts.destroy', $post->slug) }}" method="POST" class='form-inline'>
					@csrf
					{{ method_field('DELETE') }}
					<input type='submit' value="Trash" class='btn btn-danger'>
					</form>
				</td>
			</tr>
			@endforeach
		</table>
		@else
		<div class='alert alert-warning'>No Posts Yet!</div>
		@endif
@endsection