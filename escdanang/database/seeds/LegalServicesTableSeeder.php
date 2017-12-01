<?php

use Illuminate\Database\Seeder;

class LegalServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('legalServices')->insert([
            ['service_name' => 'hhhhhhh', 'description' => '', 'image' => '', 'type_of_service'=>'', 'price'=>'']
        ]);
    }
}
