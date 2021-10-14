<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VraagrubriekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rubrieks')->insert([
            [ 'type' => 'intake'],
            [ 'type' => 'algemeen'],
            [ 'type' => 'prijs'],
            [ 'type' => 'duur'],
            [ 'type' => 'accomodatie'],
         ]);
    }
}
