<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            'name' => 'administrator',
            'email' => 'admin@vleugels.be',
            'password' => bcrypt('vleugels'),
            'adminlevel' => 1
        ]); 
          
        DB::table('users')->insert([
            'name' => 'sysadmin',
            'email' => 'johan.calu@gmail.com',
            'password' => bcrypt('vleugels'),
            'adminlevel' => 2
        ]);         
    }
}
