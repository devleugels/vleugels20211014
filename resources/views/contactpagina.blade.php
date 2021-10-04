@extends('layouts.vleugelslayout')
  
@section('content')

    <!-- het uitlegkader --> 

    @php

       $kort = "contactpagina";
       $uitgebreid = "Op deze pagina krijg je een foutmelding. Wil je dit"
         ." dit foutbericht melden aan de vleugels, waarvan je alle"
         ." mogelijke contactmogelijkheden hieronder vindt";
    @endphp
    
    <x-uitlegbox
      kort="{{ $kort }}"
      uitgebreid="{{ $uitgebreid }}"
      alert="hartelijk dank" />


    @php 
    /**
    echo("[contactpagina] fout = ".json_encode($fout)."<br />");
    echo("[contactpagina] contactinfo = ".json_encode($contactinfo)."<br />");
    dd("stop");
    */
    @endphp

    <!-- het foutbericht -->
    <div class="titel">het foutbericht</div>
    <div class="box boxborderkleur">
        {{ $fout }}
    </div>

    <!-- de contactinfo -->
    <div class="container w-full my-3 mx-auto text-xl border-4 border-red-2">
        <div class="titel">De contactgegevens</div>

        <div class="w-full mx-4">Ons adres</div>
        <div class="w-full px-12">{{ $contactinfo->afzendernaam }}</div>
        <div class="w-full px-12">{{ $contactinfo->straat }}, {{ $contactinfo->huisnummer }}</div>
        <div class="w-full px-12">{{ $contactinfo->postcode }} {{ $contactinfo->gemeente }}</div>

        <div class="w-full mx-4 pt-4">telefoon : {{ $contactinfo->telefoon }}</div>
        <div class="w-full mx-4 pt-2">e-mail : {{ $contactinfo->email->email }}</div>    
    </div>
@endsection