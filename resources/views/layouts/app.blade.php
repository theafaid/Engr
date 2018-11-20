@include('layouts.header')
<div class="content-wrapper">
@include('layouts.navbar')
@yield('content')
@include('layouts.partials.subscribe_form')
</div>
@include('layouts.footer');