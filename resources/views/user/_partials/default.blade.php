<!DOCTYPE html>
<html lang="en">

@include('user._partials.header')

<body class="g-sidenav-show  bg-gray-200">

@include('user._partials.sidebar')

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

    @include('user._partials.navbar')

      @yield('content')
</div>
    @include('user._partials.footer')

  </main>

    @include('user._partials.plugins')

    @include('user._partials.scripts')
</body>

</html>