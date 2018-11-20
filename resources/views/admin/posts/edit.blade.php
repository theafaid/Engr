@extends('admin.layouts.app')
@section('content')
	<div class='card'>
		
		<div class='card-header'>Create a new post</div>
		<div class='card-body'>
			<form action="{{ route('posts.update', $post->slug) }}" method="POST" enctype="multipart/form-data">
				@csrf
				{{ method_field('PATCH') }}
				<div class='form-group'>
					Post Title
					<input type="text" class='form-control' placeholder="Title" name='title' value="{{ $post->title }}">
				</div>

				<div class='form-group'>
					Post Content
					<textarea type="text" class='form-control' placeholder="Content" name="body">{{ $post->body }}</textarea>
				</div>

				<div class='form-group'>
					Category
					<select class='form-control' name="category">
						@foreach($categories as $category)
							<option value="{{ $category->slug }}" 
								@if($category->id == $post->category_id ) selected @endif>
								{{ $category->name }}
							</option>
						@endforeach
					</select>
				</div>


				<div class='form-group'>
					Tags
					<div class='checkbox'>
						@foreach($tags as $tag)
							<label>
								<input type="checkbox" name="tags[]" value="{{ $tag->id }}"
								@foreach($post->tags as $postTag)
									@if($tag->id == $postTag->id)
										checked 
									@endif
								@endforeach
								>{{ $tag->name }}
							</label>
						@endforeach
					</div>
				</div>

				<div class='form-group'>
					Featured Image
					<img src="{{ $post->image() }}" width="100" height="100">
					<input type="file" name="image" class='form-control'>
				</div>

				<div class='form-group'>
					<input type="submit" class='form-control btn btn-primary' value="Edit Post">
				</div>
			</form>
		</div>
	</div>
@endsection