@extends('layouts.vleugelslayout')

@section('content')
<section class="w-screen">
    <!-- de titel -->
    <!-- p class="mt-4 text-4xl font-bold text-center">Emailadressen van de vleugels</p -->

    <!-- de uitlegkader --> 

    @php
       $kort = "emailadres van de vleugel";
       $uitgebreid = "Je kan deze entry editeren";  
    @endphp
    
    <x-uitlegbox
      kort="{{ $kort }}"
      uitgebreid="{{ $uitgebreid }}"
      alert="Alle velden invullen, en een juist e-mail adres ingeven" />

    @php
    /** 
      echo("[emailadressen.create] emailadressen = ".json_encode($emailadressen)."<br />\n");
      echo("[emailadressen.create] extra = ".json_encode($extra)."<br />\n");
      dd("stop");
    **/
    @endphp
    <!-- de vue component contactpersoon -->
    <emailadressen
      :data="{{ json_encode($emailadressen) }}"
      :extra="{{ json_encode($extra) }}" />          
</section>
@endsection 