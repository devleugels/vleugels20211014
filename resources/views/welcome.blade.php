@extends('layouts.vleugelslayout')
  
@section('content')
<div class="container-fluid" style="width:100%">
    <h1 class="flex text-center">welkom</h1>
    <example-component></example-component>
</div>

<div>
    <p class="text-4xl font-bold text-center text-blue-500">DaisyUI</p>
    <button class="btn btn-primary">DaisyUI Button</button>
</div>

<div>
    <p class="text-4xl font-bold text-center">test voor x-component</p>
    <!--  x-knop url="test" >{{__('Login')}}</x-knop -->
</div>
@endsection