@extends('layouts.vleugelslayout')

@section('content')
<section class="w-screen">
    <!-- de titel -->
    <p class="titel">Contactpersoon gegevens</p>

    @php 
       // echo("[vraag.create] contactpersoon = ".json_encode($contactpersoon));
    @endphp

    <!-- de uitlegkader --> 
    @php

       $kort = "Je vraag kan je hier stellen";
       $uitgebreid = "We zullen je vraag zo snel mogelijk behandelen en dan contact "
           ." met jou opnemen.";
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
      uitgebreid="{{ $uitgebreid }}" />


          
</section>
@endsection 