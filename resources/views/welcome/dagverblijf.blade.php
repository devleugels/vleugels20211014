<p id="dagverblijf" class="mt-4 text-4xl font-bold text-center">Dagverblijf</p>

<div class="mt-4 text-xl box-content text-center px-40">
  Je kan ook kiezen voor een dagverblijf. Als je even opvang nodig hebt,
  of als je er eens een dagje uit wil.
</div>

@guest 
  <x-dubbele-knop url1="detail/dagverblijf" tekst1="meer detail" url2="vraag/vraagstelling" tekst2="Stel je vraag"></x-dubbele-knop>
@else
  <x-dubbele-knop url1="detail/dagverblijf" tekst1="meer detail" url2="servicepack/dagverblijf/reserveren" tekst2="reserveren"></x-dubbele-knop>
@endguest

<!-- nu nog wat meer uitleg -->
<div class="mt-4  px-40 grid-flow-col grid-cols-3 gap-4 flex justify-center">
    <div class="container">
        <img class="w-40 object-contain object-center mx-auto" src="{{ asset('img/icon_1.svg')}}" />
        <p class="mx-auto text-xl font-semibold text-center">Mooie ruimtes</p>
        <p class="mx-auto text-xl text-center">Je verblijft in een onlangs gebouwde infrastructuur</p>
    </div>
    <div class="container">
        <img class="w-40 object-contain object-center mx-auto" src="{{ asset('img/icon_2.svg')}}" />
        <p class="mx-auto text-xl font-semibold text-center">Activiteiten</p>
        <p class="mx-auto text-xl text-center">Er zijn heel wat faciliteiten, zoals een zwembad</p>
    </div>
    <div class="container">
        <img class="w-40 object-contain object-center mx-auto" src="{{ asset('img/icon_6.svg')}}" />
        <p class="mx-auto text-xl text-center">We zorgen voor een ontspannen sfeer</p>
    </div>        
</div>
