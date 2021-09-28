@extends('layouts.vleugelslayout')

@section('content')
<section class="w-screen">
    <!-- de titel -->
    <p class="mt-4 text-4xl font-bold text-center">Emailadressen van de vleugels</p>

    <!-- de uitlegkader --> 

    @php

       $kort = "email adres van de vleugel";
       $uitgebreid = "Je kan nu voor elke dienst (naam) een e-mail adres toekennen.";
       $uitgebreid .= "Op die manier kunnen we gericht een e-mail sturen, door de naam op te geven";  
    @endphp
    
    <x-uitlegbox
      kort="{{ $kort }}"
      uitgebreid="{{ $uitgebreid }}"
      alert="Alle velden invullen, en een juist e-mail adres ingeven" />

    @php
    /** 
      echo("[emailadressen.create] emailadres = ".json_encode($emailadres)."<br />\n");
      echo("[emailadressen.create] extra = ".json_encode($extra)."<br />\n");
      dd("stop");
    **/
    @endphp
    <!-- de vue component contactpersoon -->
    <emailadressen
      :data="{{ json_encode($emailadres) }}"
      :extra="{{ json_encode($extra) }}" />          
</section>
@endsection 