@foreach($categories as $category)
    <div class="offers">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <div class="heading">
                    <h4 class="h1 heading-title">{{ $category->name }}</h4>
                    <div class="heading-line">
                        <span class="short-line"></span>
                        <span class="long-line"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="case-item-wrap">
                @foreach($category->posts()->take(3)->get() as $post)
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="case-item">
                            <div class="case-item__thumb">
                                <img src="{{ $post->image() }}" alt="our case">
                            </div>
                            <h6 class="case-item__title"><a href="{{ $post->path() }}">{{ $post->title }}</a></h6>
                        </div>
                    </div>
                @endforeach

                {{--@foreach(\App\Post::where('category_id', $category->id)->get() as $post)--}}
                    {{--{{$post}}--}}
                {{--@endforeach--}}
            </div>
        </div>
    </div>
    <div class="padded-50"></div>
@endforeach