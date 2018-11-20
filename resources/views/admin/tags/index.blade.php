@extends('admin.layouts.app')

@section('content')

	<h2>Tags</h2>
	@if(count($tags))
	<table class='table table-hovered table-bordered table-responsive'>
		<tr>
			<td>Name</td>
			<td>Slug</td>
			<td>Edit</td>
			<td>Delete</td>
		</tr>

		@foreach($tags as $tag)
		<tr>
			<td>{{ $tag->name }}</td>
			<td>
				<a href="{{ route('tags.edit', $tag->name) }}" class='btn btn-primary'>
					Edit
					<span class='glyphicon glyphicon-pencil'></span>
				</a>
			</td>

			<td>
				<form action="{{ route('tags.destroy', $tag->name) }}" method="POST">
					@csrf
					{{ method_field('DELETE') }}
					<input type='submit' value="Delete" class='btn btn-danger'>
				</form>
			</td>
		</tr>
		@endforeach
	</table>
	@else
	<div class='alert alert-warning'>No Tags Yet! </div>
	@endif
@endsection