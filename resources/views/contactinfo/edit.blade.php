@extends('layouts.vleugelslayout')

@section('content')
<section class="w-screen">
    <!-- het uitlegkader --> 
    @php
       $kort = "contact- en bankgegevens van de vleugels";
       $uitgebreid = "Je kan deze entry editeren";  
    @endphp
    
    <x-uitlegbox
      kort="{{ $kort }}"
      uitgebreid="{{ $uitgebreid }}"
      alert="gelieve alle gegevens juist in te vullen" />

    @php
    /** 
      echo("[contactinfo.edit] contactinfo = ".json_encode($contactinfo)."<br />\n");
      echo("[contactinfo.edit] extra = ".json_encode($extra)."<br />\n");
      echo("[contactinfo.edit] emailadressen = ".json_encode($emailadressen)."<br />\n");

      dd("stop");
    **/
    @endphp
    <!-- de vue component contactpersoon -->
    <contactinfo
      :data="{{ json_encode($contactinfo) }}"
      :extra="{{ json_encode($extra) }}"
      :emailadressen="{{ json_encode($emailadressen) }}" />          
</section>
@endsection 