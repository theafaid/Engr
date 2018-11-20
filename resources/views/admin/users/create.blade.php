@extends('admin.layouts.app')
@section('content')
	<div class='card'>
		<div class='card-header'>Create a new user</div>
		<div class='card-body'>
			<form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class='form-group'>
					 Name
					<input type="text" class='form-control' placeholder="Name" name='name'>
				</div>

				<div class='form-group'>
					 Email
					<input type="text" class='form-control' placeholder="Email" name='email'>
				</div>

				<div class='form-group'>
					 Password
					<input type="password" class='form-control' placeholder="Password" name='password'>
				</div>
				<div class='form-group'>
					<input type="submit" class='form-control btn btn-primary' value="Add User">
				</div>
			</form>
		</div>
	</div>
@endsection