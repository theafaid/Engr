@extends('admin.layouts.app')
@section('content')
	<div class='card'>
		<div class='card-header'>Edit Site Setting</div>
		<div class='card-body'>
			<form action="{{ route('settings.update') }}" method="POST">
				@csrf
				{{ method_field('PATCH') }}
				<div class='form-group'>
					 Site Name
					<input type="text" class='form-control' placeholder="Name" name='site_name' value="{{ settings()->site_name }}">
				</div>

				<div class='form-group'>
					 Contact Number
					<input type="text" class='form-control' placeholder="Number" name='contact_number' value="{{ settings()->contact_number }}">
				</div>

				<div class='form-group'>
					 Contact Email
					<input type="text" class='form-control' placeholder="Email" name='contact_email' value="{{ settings()->contact_email }}">
				</div>

				<div class='form-group'>
					 Address
					<textarea class='form-control' placeholder="About You" name='address'>{{settings()->address}}</textarea>
				</div>

				<div class='form-group'>
					<input type="submit" class='form-control btn btn-primary' value="Edit Site Settings">
				</div>
			</form>
		</div>
	</div>
@endsection