@extends('admin.layouts.app')
@push('css')
<!-- include summernote css/js -->
    <!-- Include Editor style. -->
<link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.5/css/froala_editor.min.css' rel='stylesheet' type='text/css' />
<link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.5/css/froala_style.min.css' rel='stylesheet' type='text/css' />
@endpush

@push('js')

</script>
@endpush
@section('content')
	<div class='card'>
		<div class='card-header'>Create a new post</div>
		<div class='card-body'>
			<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class='form-group'>
					Post Title
					<input type="text" class='form-control' placeholder="Title" name='title'>
				</div>

				<div class='form-group'>
					Post Content
					<textarea type="text" id="summernote" class='form-control' placeholder="Content" name="body"></textarea>
				</div>

				<div class='form-group'>
					Category
					<select class='form-control' name="category">
						@foreach($categories as $category)
							<option value="{{ $category->slug }}">{{ $category->name }}</option>
						@endforeach
					</select>
				</div>

				<div class='form-group'>
					Tag
						@foreach($tags as $tag)
							<div class="checkbox">
								<label>
									<input type="checkbox" value="{{ $tag->id }}" name="tags[]">
									{{ $tag->name }} 
								</label>
							</div>
						@endforeach
				</div>

				<div class='form-group'>
					Featured Image
					<input type="file" name="image" class='form-control'>
				</div>

				<div class='form-group'>
					<input type="submit" class='form-control btn btn-primary' value="Add Your Post">
				</div>
			</form>
		</div>
	</div>
@endsection