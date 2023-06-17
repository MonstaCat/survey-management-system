<!DOCTYPE html>
<html lang="en">

@include('auth._partials.header')

<body class="g-sidenav-show  bg-gray-200">

	<main class="main-content position-relative max-height-vh-100 h-100">

		@yield('content')

	</main>

	@include('auth._partials.scripts')
  
</body>

</html>