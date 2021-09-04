<p id="hotel" class="mt-4 text-4xl font-bold text-center">hotelverblijf</p>

@guest 
   <p class="mt-4 text-xl box-content px-40">
       <span>Overnachten in de vleugels kan een aangename verrassing worden.</span>
       <br />
       <span>Geïnteresseerd? Wil je ons contacteren om informatie te ontvangen, druk dan op de knop 
           <x-knop url="detail" stijl="knopje" kleur="lichtblauw">Stel je vraag.</x-knop></span>
       <span>Wil je eerst wat meer informatie bekijken, druk dan op de knop 
           <x-knop url="vraag" stijl="knopje" kleur="lichtblauw">meer detail</x-knop></span>    
   </p>

   <!-- hier nu 2 knoppen -->
   <x-dubbele-knop url1="detail" tekst1="meer detail" url2="vraag" tekst2="Stel je vraag"></x-dubbele-knop>
 @else
   <p class="mt-4 text-xl box-content px-40">
       <span>Overnachten in de vleugels is steeds een aangename verrassing.</span>
       <br />
       <span>Wil je reserveren? druk dan op de knop 
           <x-knop url="servicepack/hotel/reserveren" stijl="knopje" kleur="lichtblauw">Overzicht en/of reserveren.</x-knop></span>
       <span>Wil je bijkomende informatie, stel dan je vraag door op de knop 
       <x-knop url="#" stijl="knopje" kleur="lichtblauw">Stel je vraag te klikken.</x-knop></span>
   </p>

   <!-- hier knoppen -->
   <x-dubbele-knop url1="servicepack/hotel/reserveren" tekst1="overzicht en/of reserveren" url2="vraag/vraagstelling" tekst2="Stel je vraag"></x-dubbele-knop>
@endguest

<!-- links een foto en rechts wat meer tekst -->
<div class="inline-flex mt-4 box-content px-40 space-x-4">
    <img src="{{ asset('img/luchtfotovleugels.jpeg') }}"
         class="object-contain object-scale-down w-6/12" />
    <div>
        <img src="{{ asset('img/quote.png') }}" 
             class="quote" />
        <p class="mt-2 text-xl">in vitae nisi aliquam, scelerisque leo a, volutpat sem. Vivamus rutrum dui fermentum eros hendrerit, id lobortis leo volutpat. Maecenas sollicitudin est in libero pretium interdum. Nullam volutpat dui sem, ac congue purus hendrerit, id lobortis leo luctus nec.</p>
        <img src="{{ asset('img/quote.png') }}" 
             class="quote" />
        
        <div class="inline-flex box-content px-20 space-x-4">
            <img src="{{ asset('img/bart-riemaecker.png') }}">
            <div>
                <p>Bart Riemaecker</p>
                <p>directeur personeel</p>
            </div>   
        </div>  
    </div>
</div>
