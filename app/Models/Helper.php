<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contactpersoon;

class Helper extends Model
{
    use HasFactory;

    /**
     * makeCurrentActive
     *   we maken een sessievariabele current_active
     *     waarin we 3 onderdelen toevoegen
     *     - type ( 'client' of 'contactpersoon')
     *     - id ( de id van client of contaactpersoon, naargelang type)
     *     - user_id 
     * 
     *  @param : type - client of contactpersoon
     *  @param : user_id - de id als user
     *  @retour : niks
     */
    public static function makeCurrentActive( $type, $user_id)
    {
        // we beginnen met het bepalen van het type
        switch ( $type ){
            case 'client' :
                // zoek de client die hoort bij de user_id
                $item = (object)[ 'id' => 555, ]; // TODO 
                break;
            case 'contactpersoon' :
                $item = Contactpersoon::where( 'user_id', $user_id)->first();
                break;
            default:
              // fout - we tonen de fout
              $foutbericht = "[Helper@makeCurrentActive] type = $type en user_id = $user_id\n"
                . "het type is noch client, noch contactpersoon";
              session(['fout' => $foutbericht]);
              dd("[Helper@makeCurrentActive( $type, $user_id) ");
 
              return route('showFout');
        }

        $current = [
            'type' => $type,
            'id' => $item->id,
            'user_id' => $user_id,
        ];
        session(['current_active' => $current]);
        return;
    }

    /**
     * getEmailadres
     *   Haalt het e-mail adres op horende bij de huidige actieve user
     *   Indien deze een client is, moet je de bijhorende contactpersoon
     *     ophalen en het e-mail adres van deze laatste ophalen
     * 
     *  @param : current_active ( de huidige actieve user)
     *  @return : het e-mail adres van de contactpersoon ( of foutmelding indien geen gevonden);
     */
    public static function getEmailadres( $current_active )
    {
        switch( $current_active['type'] ){
            case 'client' :
                dd("[Helper@getEmailadres] is client TODO");
                break;
            case 'contactpersoon' :
                $cp = Contactpersoon::find( $current_active['id'] );
                if (!$cp){
                    dd("[Helper@getEmailadres] zou contactpersoon moeten zijn, maar $current_active->id niet gevonden");
                }
                $email = $cp->email;
                if (!$email || strlen($email) == 0 || !Helper::emailFormat($email)){
                    dd("[Helper@getEmailadres] bevat geen valide e-mail adres ( $email )");
                }
                return $email;
            default :
              dd("[Helper@getEmailadres] type is niet valide ( $current_active->type )");
        }
    }

    /**
     * emailFormat
     *   controleert het formaat van deze e-mail en retourneert true
     *   indien het voldoet
     * @param : email - een te testen e-mail adres
     * @return : true als valide / false anders
     */
    public static function emailFormat( $email ){
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    /**
     * getVolledigenaam
     *    zoekt uit welk type user dit is en haalt het overeenstemmende
     *    record, waaruit we de voor- en familienaam halen
     *  @param : current_active - de huidige actieve user
     *  @return : de volledige familienaam ( of fout)
     */
    public static function getVolledigenaam( $current_active){
        switch( $current_active['type'] ){
            case 'client' :
                dd("[Helper@getVolledigenaam] is client TODO");
                break;
            case 'contactpersoon' :
                $cp = Contactpersoon::find( $current_active['id'] );
                if (!$cp){
                    dd("[Helper@getVolledigenaam] zou contactpersoon moeten zijn, maar $current_active->id niet gevonden");
                }
                $naam = $cp->voornaam." ".$cp->familienaam;
                return $naam;
            default :
              dd("[Helper@getVolledigenaam] type is niet valide ( $current_active->type )");
        }

    }
}
