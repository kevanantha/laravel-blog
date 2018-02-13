<!DOCTYPE html>
<html lang="en">

    @include('partials._head')
    <body>

        {{ Auth::check() ? "Logged in" : "Logged out" }}

        @include('partials._nav')

        <div class="container">
            @include('partials._messages')

            @yield('content')

            @include('partials._footer')
        </div>
        <!-- end of .container -->

        @include('partials._scripts')

    @yield('scripts')
    </body>

</html>