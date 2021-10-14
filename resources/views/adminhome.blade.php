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
                    $aantal = 0;
                    $info = [
                        'header' => 'Emailadressen',
                        'icon' => 'fa-envelope',
                        'text' => 'De bijzondere e-mailadressen van de vleugels worden hier bijgehouden',
                        'button' => 'email adressen',
                        'href' => '/emailadressen',
                        'aantal' => $aantal,
                    ];
                @endphp
                @include('admin.card', $info);
            </div>

            <div>
                @php
                    $info = [
                        'header' => 'Contactinfo ( de vleugels )',
                        'icon' => 'fa-envelope',
                        'text' => 'De gegevens van de vleugels kan je hier editeren',
                        'button' => 'contactinfo',
                        'href' => '/contactinfo/1/edit',
                        'aantal' => 0,
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
                    $aantal = 0;
                    $info = [
                        'header' => 'Vraagrubrieken',
                        'icon' => 'fa-question',
                        'text' => 'De verschillende rubrieken waaruit de vraagsteller zal kunnen kiezen',
                        'button' => 'vraagrubrieken',
                        'href' => '/vraagrubriek',
                        'aantal' => $aantal,
                    ];
                @endphp
                @include('admin.card', $info);
            </div>

            <div>
                @php
                    $info = [
                        'header' => 'Contactinfo ( de vleugels )',
                        'icon' => 'fa-envelope',
                        'text' => 'De gegevens van de vleugels kan je hier editeren',
                        'button' => 'contactinfo',
                        'href' => '/contactinfo/1/edit',
                        'aantal' => 0,
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