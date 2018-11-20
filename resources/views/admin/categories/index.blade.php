@extends('admin.layouts.app')

@section('content')

	<h2>Categories</h2>
	@if(count($categories))
	<table class='table table-hovered table-bordered table-responsive'>
		<tr>
			<td>Name</td>
			<td>Slug</td>
			<td>Edit</td>
			<td>Delete</td>
		</tr>

		@foreach($categories as $category)
		<tr>
			<td>{{ $category->name }}</td>
			<td>{{ $category->slug }}</td>
			<td>
				<a href="{{ route('categories.edit', $category->slug) }}" class='btn btn-primary'>
					Edit
					<span class='glyphicon glyphicon-pencil'></span>
				</a>
			</td>

			<td>
				<form action="{{ route('categories.destroy', $category->slug) }}" method="POST">
					@csrf
					{{ method_field('DELETE') }}
					<input type='submit' value="Delete" class='btn btn-danger'>
				</form>
			</td>
		</tr>
		@endforeach
	</table>
	@else
	<div class='alert alert-warning'>No Categories Yet! you cannot create any until you create at least one category
	</div>
	@endif
@endsection