@include('backend.include.header')
@include('backend.include.navbar')
@include('backend.include.menu')
@include('backend.include.aside')
@include('backend.include.footer')

@yield('header')
<div id="app">
    @yield('navbar')
    <div class="content-wrapper">
        @yield('menu')
        <div class="content container-fluid">
            @yield('content')
        </div>
        @yield('aside')
    </div>
</div>
@yield('footer')