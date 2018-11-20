@extends('admin.layouts.app')

@section('content')
	<h2>All Users</h2>

	@if(count($users))
		<table class='table table-hovered table-bordered table-responsive'>
			<tr>
				<td>Image</td>
				<td>Name</td>
				<td>Email</td>
				<td>Permissions</td>
				<td>Delete</td>
			</tr>

			@foreach($users as $user)
			<tr>
				<td>
					<img src="{{ $user->image() }}" width="50" height="50">
				</td>
				<td>{{$user->name}}</td>
				<td>{{ $user->email }}</td>
				<td>
					<form action="{{ route('users.admin', $user->id) }}" method="post" class='form-inline'>
						@csrf
						{{ method_field('PATCH') }}
						<input type='submit' value="{{ !$user->admin ? 'Make Admin' : 'Remove Admin' }} " class='btn btn-danger'>
					</form>
				</td>

				<td>
					<form action="{{ route('users.destroy', $user->id) }}" method="post" class='form-inline'>
					@csrf
					{{ method_field('DELETE') }}
					<input type='submit' value="Trash" class='btn btn-danger'>
					</form>
				</td>
			</tr>
			@endforeach
		</table>
		@else
		<div class='alert alert-warning'>No users Yet!</div>
		@endif
@endsection