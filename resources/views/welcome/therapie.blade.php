<p id="therapie" class="mt-4 text-4xl font-bold text-center">Therapie</p>

<div class="mt-4 text-xl box-content text-center px-40">
  De vleugels biedt ook een therapie aan ....
</div>

@guest 
  <x-dubbele-knop url1="detail/therapie" tekst1="meer detail" url2="vraag" tekst2="Stel je vraag"></x-dubbele-knop>
@else
  <x-dubbele-knop url1="detail/therapie" tekst1="meer detail" url2="servicepack/therapie/reserveren" tekst2="reserveren"></x-dubbele-knop>
@endguest

<!-- nu nog wat meer uitleg -->
<div class="mt-4  px-40 grid-flow-col grid-cols-3 gap-4 flex justify-center">
    <div class="container">
        <img class="w-40 object-contain object-center mx-auto" src="{{ asset('img/icon_2.svg')}}" />
        <p class="mx-auto text-xl font-semibold text-center">Watertherapie</p>
        <p class="mx-auto text-xl text-center">een therapie</p>
    </div>
    <div class="container">
        <img class="w-40 object-contain object-center mx-auto" src="{{ asset('img/icon_4.svg')}}" />
        <p class="mx-auto text-xl font-semibold text-center">Wandeltherapie</p>
        <p class="mx-auto text-xl text-center">wandelen in klerken</p>
    </div>
    <div class="container">
        <img class="w-40 object-contain object-center mx-auto" src="{{ asset('img/icon_5.svg')}}" />
        <p class="mx-auto text-xl font-semibold text-center">Wandeltherapie</p>
        <p class="mx-auto text-xl text-center">We zorgen voor een ontspannen sfeer</p>
    </div>        
</div>
