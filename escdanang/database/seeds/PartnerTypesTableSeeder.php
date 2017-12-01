<?php

use Illuminate\Database\Seeder;

class PartnerTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('partnerTypes')->insert([
            ['partner_name' => '', 'description' => '']
        ]);
    }
}
