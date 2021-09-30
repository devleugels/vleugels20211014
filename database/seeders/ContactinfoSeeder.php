<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactinfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contactinfos')->insert([
            'banknaam' => 'ING',
            'iban' => 'BE77 4761 2457 2142',
            'bic' =>'BRUBEBB',
            'afzendernaam' => 'De Vleugels vzw',
            'straat' => 'stokstraat',
            'huisnummer'=> '1',
            'postcode' => '8650',
            'gemeente' => 'Klerken',
            'telefoon' => '051 50 12 12',
            'email_id' => 1
        ]);
    }
}
