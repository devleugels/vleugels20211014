<div class="navbar mx-auto mb-2  bg-neutral 
            text-neutral-content rounded-box" >
  <div class="navbar-start flex-1 px-2 mx-2">
    <a href="/">
      <img src = "{{ asset('/img/logovleugels.png') }}"
            width="88" height="48">
    </a>

  </div> 
  <div class="navbar-center"></div>
  <div class="navbar-end flex-none  px-2 mx-2 lg:flex">
    @guest
      <x-knop url="#" stijl="menubalk" kleur="blauw">{{ __('Login') }}</x-knop>
      <x-knop url="#" stijl="menubalk" kleur="blouw">Stel je vraag</x-knop>
    @else
      <div>geen guest - dus aangemeld</div>
    @endguest 
  </div> 
</div>
