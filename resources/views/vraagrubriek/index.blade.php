@extends('layouts.vleugelslayout')

@section('content')
<section class="w-screen">
    <!-- het uitlegkader --> 
    @php

       $kort = "Overzicht van de vraagrubrieken";
       $uitgebreid = "Je kan rubrieken verwijderen, toevoegen en verbeteren";
    @endphp 

    <x-uitlegbox
      kort="{{ $kort }}"
      uitgebreid="{{ $uitgebreid }}" />

    @php
    /*
        echo("[vraagrubriek.index] vraagrubriek = ".json_encode($vraagrubriek)."<br />");
        echo("[vraagrubriek.index] extra = ".json_encode($extra)."<br />");
        ddd("einde");
    */
    @endphp

    <vraagrubrieklijst
      :data="{{ json_encode($vraagrubriek) }}"
      :extra="{{ json_encode($extra) }}" />

    

</section>
@endsection 