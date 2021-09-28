@extends('layouts.vleugelslayout')

@section('content')
<section class="w-screen">
    <!-- de titel -->
    <p class="titel">Email adressen van de vleugels</p>

    <!-- de uitlegkader --> 
    @php

       $kort = "De e-mailadressen van de vleugels";
       $uitgebreid = "Naargelang de functie (gegeven in de naam) kan je een ander"
         ." e-mail adres opgeven";
    @endphp 

    <x-uitlegbox
      kort="{{ $kort }}"
      uitgebreid="{{ $uitgebreid }}"
      alert="Let goed op om het e-mail adres juist in te geven" />

    @php
    /*
        echo("[emailadressen.index] emailadressen = ".json_encode($emailadressen)."<br />");
        echo("[emailadressen.index] extra = ".json_encode($extra)."<br />");
        echo("[emailadressen.index] display = ".json_encode($display)."<br />");
        echo("[emailadressen.index] knoppen = ".json_encode($knoppen)."<br />");
        ddd("einde");
    */
    @endphp

    <tabel 
      :data = "{{ json_encode($emailadressen) }}"
      :extra = "{{ json_encode($extra) }}"
      :display = "{{ json_encode($display) }}"
      :knoppen = "{{ json_encode($knoppen) }}" />

    

</section>
@endsection 