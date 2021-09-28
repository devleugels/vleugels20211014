@if ($flash = session('bericht'))
   <div id="hideDiv" class="flash" role='alert'>
       {{ $flash }}
   </div>

   <!-- class='alert alert-success text-center fixed  bottom-0 right-0 rounded-xl shadow-lg border px-6 py-5 mx-6 my-8 hideMe' -->
@endif
