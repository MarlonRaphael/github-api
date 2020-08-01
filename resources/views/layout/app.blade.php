<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('partials.head')
<body>
<!-- Sidenav -->
@include('partials.sidebar')
<!-- Main content -->
<div class="main-content" id="panel">
  <!-- Header -->
  @include('partials.header')
  <!-- Page content -->
  <div class="container-fluid mt--6">
    @yield('content')
  </div>
</div>
@include('partials.scripts')
</body>
</html>