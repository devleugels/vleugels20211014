<!doctype html>
<html data-theme="lofi" 
      lang="{{ str_replace('_','-', app()->getLocale()) }}">
  <head data-theme="pastel">
    @include('layouts.basislayout')
  </head>
  <body>
    <div data-theme="lofi" id="app" class="container-fluid"
         style="width:100%">
      <main data-theme="lofi" class="container-fluid" style="width:100%">
        @yield('content')
      </main>
    </div>
    @include('layouts.footer')
  </body>
</html>