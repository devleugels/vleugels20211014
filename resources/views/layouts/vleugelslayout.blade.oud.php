<!doctype html>
<html lang="{{ str_replace('_','-', app()->getLocale()) }}">
  <head>
    @include('layouts.basislayout')
  </head>
  <body>
    <div data-theme="lofi" id="app" class="container-fluid"
         style="width:100%">
      <main data-theme="lofi"  class="container-fluid" style="width:100%">
      <!-- -->
        @include('partials.navbar')
        @include('partials.flash')
        @yield('content')
      </main>
    </div>
    @include('layouts.footer')
  </body>
</html>