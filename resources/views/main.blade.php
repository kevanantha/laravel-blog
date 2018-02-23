<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

    @include('partials._head')
<body>
    <div id="app">

        {{--{{ Auth::check() ? "Logged in" : "Logged out" }}--}}

        @include('partials._nav')

        <div class="container">
            @include('partials._messages')

            @yield('content')

            @include('partials._footer')
        </div>
        <!-- end of .container -->

        @include('partials._scripts')
    </div>

    @yield('scripts')
</body>

</html>