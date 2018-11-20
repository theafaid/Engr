@foreach($latestPosts as $key => $post)
@if($key == 0)
<div class='row'>
    <div class='col-lg-2'></div>
    <div class='col-lg-8'>
         <article class="hentry post post-standard has-post-thumbnail sticky">
            <div class="post-thumb">
                <img src="{{ $post->image() }}" alt="seo">
                <div class="overlay"></div>
                <a href="{{ $post->image() }}" class="link-image js-zoom-image">
                    <i class="seoicon-zoom"></i>
                </a>
                <a href="{{ $post->path() }}" class="link-post">
                    <i class="seoicon-link-bold"></i>
                </a>
            </div>

            <div class="post__content">

                <div class="post__content-info">

                        <h2 class="post__title entry-title ">
                            <a href="{{ $post->path() }}">{{ $post->title }}</a>
                        </h2>

                        <div class="post-additional-info">

                            <span class="post__date">

                                <i class="seoicon-clock"></i>

                                <time class="published" datetime="2016-04-17 12:00:00">
                                    {{ $post->created_at }}
                                </time>

                            </span>
                            <span class="category">
                                <i class="seoicon-tags"></i>
                                    <a href="#">{{ $post->category->name }}</a>
                            </span>

                            <span class="category">
                                <i class="fa fa-eye"></i>
                                    <a href="#">{{ $post->views }}</a>
                            </span>
                        </div>
                    </div>
                </div>
            </article>

    </div>
    <div class='col-lg-2'></div>
</div>
@endif

@if($key > 0)
<div class='col-lg-6'>

<article class="hentry post post-standard has-post-thumbnail sticky">
            <div class="post-thumb">
                <img src="{{ $post->image() }}" alt="seo">
                <div class="overlay"></div>
                <a href="{{ $post->image() }}" class="link-image js-zoom-image">
                    <i class="seoicon-zoom"></i>
                </a>
                <a href="#" class="link-post">
                    <i class="seoicon-link-bold"></i>
                </a>
            </div>

            <div class="post__content">

                <div class="post__content-info">

                        <h2 class="post__title entry-title ">
                            <a href="{{ $post->path() }}">{{ $post->title }}</a>
                        </h2>

                        <div class="post-additional-info">

                            <span class="post__date">

                                <i class="seoicon-clock"></i>

                                <time class="published" datetime="2016-04-17 12:00:00">
                                    {{ $post->created_at }}
                                </time>

                            </span>

                            <span class="category">
                                <i class="seoicon-tags"></i>
                                    <a href="#">{{ $post->category->name }}</a>
                            </span>

                            <span class="category">
                                <i class="fa fa-eye"></i>
                                    <a href="#">{{ $post->views }}</a>
                            </span>
                        </div>
                    </div>
                </div>
            </article>
        </div>
        @endif
@endforeach