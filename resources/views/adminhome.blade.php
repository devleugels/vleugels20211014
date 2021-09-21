@extends('layouts.vleugelslayout')
  
@section('content')
<div class="min-h-screen w-screen" style="width:100%">
    <div class="titel">Administratie</div>

    <div class="adminkader">
        <div class="adminrij">
            <div>
                @php
                    $aantal_openstaande_contactpersonen = 2;
                    $info = [
                        'header' => 'Contactpersonen ( en intake )',
                        'icon' => 'fa-envelope',
                        'text' => 'Overzicht van de contactpersonen en intake',
                        'button' => 'contactpersonen',
                        'href' => '/contactpersoon',
                        'aantal' => $aantal_openstaande_contactpersonen,
                    ];
                @endphp
                @include('admin.card', $info);
            </div>

            <div>
                @php
                    $aantal_openstaande_contactpersonen = 2;
                    $info = [
                        'header' => 'Contactpersonen ( en intake )',
                        'icon' => 'fa-envelope',
                        'text' => 'Overzicht van de contactpersonen en intake',
                        'button' => 'contactpersonen',
                        'href' => '/contactpersoon',
                        'aantal' => $aantal_openstaande_contactpersonen,
                    ];
                @endphp
                @include('admin.card', $info);
            </div>

            <div>
                @php
                    $aantal_openstaande_contactpersonen = 2;
                    $info = [
                        'header' => 'Contactpersonen ( en intake )',
                        'icon' => 'fa-envelope',
                        'text' => 'Overzicht van de contactpersonen en intake',
                        'button' => 'contactpersonen',
                        'href' => '/contactpersoon',
                        'aantal' => $aantal_openstaande_contactpersonen,
                    ];
                @endphp
                @include('admin.card', $info);
            </div>
        </div>

        <div class="adminrij">
            <div>
                @php
                    $aantal_openstaande_contactpersonen = 2;
                    $info = [
                        'header' => 'Contactpersonen ( en intake )',
                        'icon' => 'fa-envelope',
                        'text' => 'Overzicht van de contactpersonen en intake',
                        'button' => 'contactpersonen',
                        'href' => '/contactpersoon',
                        'aantal' => $aantal_openstaande_contactpersonen,
                    ];
                @endphp
                @include('admin.card', $info);
            </div>

            <div>
                @php
                    $aantal_openstaande_contactpersonen = 2;
                    $info = [
                        'header' => 'Contactpersonen ( en intake )',
                        'icon' => 'fa-envelope',
                        'text' => 'Overzicht van de contactpersonen en intake',
                        'button' => 'contactpersonen',
                        'href' => '/contactpersoon',
                        'aantal' => $aantal_openstaande_contactpersonen,
                    ];
                @endphp
                @include('admin.card', $info);
            </div>

            <div>
                @php
                    $aantal_openstaande_contactpersonen = 2;
                    $info = [
                        'header' => 'Contactpersonen ( en intake )',
                        'icon' => 'fa-envelope',
                        'text' => 'Overzicht van de contactpersonen en intake',
                        'button' => 'contactpersonen',
                        'href' => '/contactpersoon',
                        'aantal' => $aantal_openstaande_contactpersonen,
                    ];
                @endphp
                @include('admin.card', $info);
            </div>
        </div>        

    </div>


    

</div>
@endsection