@include('back.includes.header')

@include('back.includes.navbar')
@if(Auth::user()->morph->role->slug==='reception')
    @include('back.reception-counselor.includes.sidebar')
@elseif(Auth::user()->morph->role->slug==='counselor')
    @include('back.reception-counselor.includes.c-sidebar')
@elseif(Auth::user()->morph->role->slug==='admin')
    @include('back.includes.sidebar')
@endif
@include('back.includes.footer')

@yield('header')

    @yield('navbar')

    @yield('sidebar')

    @yield('content')


@yield('footer')