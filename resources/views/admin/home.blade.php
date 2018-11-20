@extends('admin.layouts.app')

@section('title')
	{{ config('app.name', 'Laravel') }} Dashboard
@endsection

@section('content')

<button type="button" class="btn btn-dark" style="height: 200px !important;width:20% !important">
	<a href="{{ route('users.index') }}" style="color:#fff">Users ({{ $users }})</a>
</button>

<button type="button" class="btn btn-secondary" style="height: 200px !important;width:20% !important">
	<a href="{{ route('categories.index') }}" style="color:#fff">Categories ({{ $categoriesCount }})</a>
</button>


<button type="button" class="btn btn-dark" style="height: 200px !important;width:20% !important">
	<a href="{{ route('posts.index') }}" style="color:#fff">Published ({{ $published }})</a>
</button>

<button type="button" class="btn btn-secondary" style="height: 200px !important;width:20% !important">
	<a href="{{ route('posts.trashed') }}" style="color:#fff">Trashed ({{ $trashed }})</a>
</button>
@endsection
