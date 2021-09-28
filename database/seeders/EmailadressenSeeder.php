<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmailadressenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('emailadressens')->insert([
            'naam' => 'info',
            'email' => 'info@devleugels.be',
        ]);
        
        DB::table('emailadressens')->insert([
            'naam' => 'boekhouding',
            'email' => 'info@devleugels.be',
        ]);
        
        DB::table('emailadressens')->insert([
            'naam' => 'sysadmin',
            'email' => 'johan.calu@gmail.com',
        ]);  
    }
}
