@extends('layouts.app')

@section('content')
<!-- Stunning Header -->

<div class="stunning-header stunning-header-bg-lightviolet">
    <div class="stunning-header-content">
        <h1 class="stunning-header-title">Search Result For: {{ $name }}</h1>
    </div>
</div>

<!-- End Stunning Header -->

<!-- Post Details -->


<div class="container">
    <div class="row medium-padding120">
        <main class="main">
            <div class="row">
            @if(count($posts))
                    <div class="case-item-wrap">
                        @foreach($posts as $post)
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="case-item">
                                <div class="case-item__thumb">
                                    <img width="200"  src="{{ $post->image() }}" alt="our case">
                                </div>
                                <h6 class="case-item__title"><a href="{{ $post->path() }}">{{ $post->title }}</a></h6>
                            </div>
                        </div>
                        @endforeach
                    </div>
            @else
            <div>We Can't found any matches for "{{ $name }}"</div>       
            @endif
            </div>

            <!-- End Post Details -->
              <div class="heading-line">
        </main>
    </div>
</div>
@endsection