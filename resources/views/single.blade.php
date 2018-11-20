@extends('layouts.app')
@push('js')
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5bb647c48a7b4fd5"></script>
@endpush
@section('content')
<div class="stunning-header stunning-header-bg-lightviolet">
    <div class="stunning-header-content">
        <h1 class="stunning-header-title">{{ $post->title }}</h1>
    </div>
</div>

<!-- End Stunning Header -->

<!-- Post Details -->


<div class="container">
    <div class="row medium-padding120">
        <main class="main">
            <div class="col-lg-10 col-lg-offset-1">
                <article class="hentry post post-standard-details">

                    <div class="post-thumb">
                        <img width="1366" height="500" src="{{ $post->image() }}" alt="seo">
                    </div>

                    <div class="post__content">


                        <div class="post-additional-info">

                            <div class="post__author author vcard">
                                Posted by

                                <div class="post__author-name fn">
                                    <a href="#">{{ $post->user->name }}</a>
                                </div>

                            </div>

                            <span class="post__date">

                                <i class="seoicon-clock"></i>

                                <time class="published" datetime="2016-03-20 12:00:00">
                                    {{ $post->created_at }}
                                </time>

                            </span>

                            <span class="category">
                                <i class="seoicon-tags"></i>
                                <a href="{{ $post->category->path() }}">{{ $post->category->name}}</a>
                            </span>

                        </div>

                        <div class="post__content-info">
                    		{{ $post->body }} <hr>

                            <div class="widget w-tags">
                                <div class="tags-wrap">
                                   @foreach($post->tags as $tag)
                                   	<a href='{{ route('tag.index', $tag->name) }}'>{{ $tag->name }}</a>
                                   @endforeach
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="socials">Share:.
                        <div class="addthis_inline_share_toolbox"></div>
                    </div>

                </article>

                <div class="blog-details-author">

                    <div class="blog-details-author-thumb">
                        <img src="{{ $post->user->image() }}" width="110" height="111" alt="Author">
                    </div>

                    <div class="blog-details-author-content">
                        <div class="author-info">
                            <h5 class="author-name">{{ $post->user->name }}</h5>
                        </div>
                        <p class="text">
                        	{{ $post->user->profile->about }}
                        </p>
                        <div class="socials">

                    		@if($post->user->profile->facebook)
                            <a href="{{ $post->user->profile->facebook }}" class="social__item">
                                <img src="/app/svg/circle-facebook.svg" alt="facebook">
                            </a>
                            @endif

                            @if($post->user->profile->youtube)
                            <a href="{{ $post->user->profile->youtube }}" class="social__item">
                                <img src="/app/svg/youtube.svg" alt="youtube">
                            </a>
                            @endif

                        </div>
                    </div>
                </div>

                <div class="pagination-arrow">

                	@if($next)
                    <a href="{{ $next->path() }}" class="btn-prev-wrap">
                        <svg class="btn-prev">
                            <use xlink:href="#arrow-left"></use>
                        </svg>
                        <div class="btn-content">
                            <div class="btn-content-title">Next Post</div>
                            <p class="btn-content-subtitle">{{ str_limit($next->title, 20) }}</p>
                        </div>
                    </a>
                    @endif

                    @if($prev)
                    <a href="{{ $prev->path() }}" class="btn-next-wrap">
                        <div class="btn-content">
                            <div class="btn-content-title">Previous Post</div>
                            <p class="btn-content-subtitle">{{ str_limit($prev->title, 20) }}</p>
                        </div>
                        <svg class="btn-next">
                            <use xlink:href="#arrow-right"></use>
                        </svg>
                    </a>
                    @endif

                </div>

                <div class="comments">

                    <div class="heading text-center">
                        <h4 class="h1 heading-title">Comments</h4>
                        <div class="heading-line">
                            <span class="short-line"></span>
                            <span class="long-line"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @include("layouts.partials.disqus")
                </div>
            <!-- End Post Details -->

        </main>
    </div>
</div>
@endsection