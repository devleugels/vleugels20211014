<section class="hero container max-w-screen-lg mx-auto pb-10">
    <img class="mx-auto" src="{{ asset('img/logovleugels.png')}}"alt="screenshot" >
</section>

<div class="flex flex-wrap justify-center">
    <x-knop url="#hotel" stijl="menubalk" kleur="blauw">hotel</x-knop>
    <x-knop url="#dagverblijf" stijl="menubalk" kleur="blauw">dagverblijf</x-knop>
    <x-knop url="#therapie" stijl="menubalk" kleur="blauw">therapie</x-knop>
    @auth
        <x-knop url="#" stijl="menubalk" kleur="blauw">detailinfo van klant</x-knop>
        <x-knop url="#" stijl="menubalk" kleur="blauw">wijzig een service</x-knop>
    @endauth
</div>



