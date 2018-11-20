@extends('admin.layouts.app')

@section('content')
	<h2>Trashed Posts</h2>
	@if(count($trashed))
	<table class='table table-hovered table-bordered table-responsive'>
		<tr>
			<td>Title</td>
			<td>Image</td>
			<td>Category</td>
			<td>By</td>
			<td>Deleted At</td>
			<td>Restore</td>
			<td>Delete Permanently</td>
		</tr>

		@foreach($trashed as $post)
		<tr>
			<td>{{ str_limit($post->title, 20) }}</td>
			<td>
				<img src="{{ $post->image() }}" width="50" height="50">
			</td>
			<td>{{ $post->category->name }}</td>
			<td>{{ $post->user->name }}</td>
			<td>{{ $post->deleted_at->diffForHumans() }}</td>

			<td>
				<form action="{{ route('posts.restore', $post->slug) }}" method="POST" class='form-inline'>
				@csrf
				<input type='submit' value="Restore" class='btn btn-info'>
				</form>
			</td>


			<td>
				<form action="{{ route('posts.kill', $post->slug) }}" method="POST" class='form-inline'>
				@csrf
				{{ method_field('DELETE') }}
				<input type='submit' value="Delete" class='btn btn-danger'>
				</form>
			</td>

		</tr>
		@endforeach
	</table>
		@else 
			<div class='alert alert-warning'>No Trashed Posts !</div>
		@endif
@endsection