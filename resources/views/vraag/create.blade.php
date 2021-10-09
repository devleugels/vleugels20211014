@extends('layouts.vleugelslayout')

@section('content')
<section class="w-screen">
    <!-- de titel -->


    @php 
       echo("[vraag.create] email = $email<br />\n");
       echo(" en vraagrubrieken = ".json_encode($vraagrubrieken)."<br />\n");
       echo(" en volledigenaam = $volledigenaam");
    @endphp

    <!-- de uitlegkader --> 
    @php

       $kort = "Je kan hier je vraag stellen";
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