@extends('layouts.vleugelslayout')

@section('content')
<section class="w-screen">
    <!-- de titel -->
    <p class="mt-4 text-4xl font-bold text-center">Contactpersoon gegevens</p>

    <!-- de uitlegkader --> 

    @php

       $kort = "gegevens van de contactpersoon";
       $uitgebreid = "Om in staat te zijn u als contactpersoon te bereiken, vragen we om een";
       $uitgebreid .= " zo volledig mogelijke informatie te bezorgen";
       if( isset($origin)){
           $data =$origin['origin'];
           if ( $data == 'vraagcontroller'){
             $kort = "de gegevens nodig om je vraag te kunnen beantwoorden";
             $uitgebreid = "We vragen om zo volledig mogelijk alle gegevens in te vullen,"
               ." zodat we je kunnen bereiken om je vraag te beantwoorden";
           }
       }  
    @endphp
    
    <x-uitlegbox
      kort="{{ $kort }}"
      uitgebreid="{{ $uitgebreid }}"
      alert="Gelieve zoveel mogelijk velden in te vullen" />

    <!-- de vue component contactpersoon -->
    <contactpersoon />
    @php 
      echo("[contactpersoon.create na vue contactpersoon]");  
    @endphp
    
</section>
@endsection 