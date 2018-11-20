@extends('layouts.app')

@section('content')
<div class="header-spacer"></div>

    <div class="container">
        @include('layouts.partials.latest_posts_lists')
    </div>


    <div class="container-fluid">
        <div class="row medium-padding120 bg-border-color">
            <div class="container">
                <div class="col-lg-12">
                    @include('layouts.partials.posts_by_category')
                </div>
            </div>
        </div>
    </div>
@endsection