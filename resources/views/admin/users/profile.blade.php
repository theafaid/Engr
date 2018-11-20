@extends('admin.layouts.app')
@section('content')
	<div class='card'>
		<div class='card-header'>Edit Your Profile</div>
		<div class='card-body'>
			<form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
				@csrf
				{{ method_field('PATCH') }}
				<div class='form-group'>
					 Name
					<input type="text" class='form-control' placeholder="Name" name='name' value="{{ $user->name }}">
				</div>

				<div class='form-group'>
					 Email
					<input type="text" class='form-control' placeholder="Email" name='email' value="{{ $user->email }}">
				</div>

				<div class='form-group'>
					 Password
					<input type="password" class='form-control' placeholder="Password" name='password'>
				</div>

				<div class='form-group'>
					 Avatar
					 <img src="{{ $user->image() }}" widht="70" height="70" class='rounded-circle'>
					<input type="file" class='form-control' name='avatar'>
				</div>

				<div class='form-group'>
					 Facebook
					<input type="text" class='form-control' placeholder="Facebook" name='facebook' value="{{ $user->profile->youtube }}">
				</div>

				<div class='form-group'>
					 Youtube
					<input type="text" class='form-control' placeholder="Youtube" name='youtube' value="{{ $user->profile->youtube }}">
				</div>

				<div class='form-group'>
					 About You
					<textarea class='form-control' placeholder="About You" name='about'>{{ $user->profile->about }}</textarea>
				</div>


				<div class='form-group'>
					<input type="submit" class='form-control btn btn-primary' value="Edit My Profile">
				</div>
			</form>
		</div>
	</div>
@endsection