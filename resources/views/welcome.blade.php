@extends('layouts.vleugelslayout')
  
@section('content')
<div class="min-h-screen w-screen" style="width:100%">
    @include('welcome.home')
    @include('welcome.hotel')
    @include('welcome.dagverblijf')
    @include('welcome.therapie')
    @include ('welcome.footer')
</div>

<!--div class="container-fluid" style="width:100%">
    <h1 class="flex text-center">welkom</h1>
    <example-component></example-component>
</div>

<div>
    <p class="text-4xl font-bold text-center text-blue-500">DaisyUI</p>
    <button class="btn btn-primary">DaisyUI Button</button>
</div>

<div>
    <p class="text-4xl font-bold text-center">test voor x-component</p>
</div -->
@endsection