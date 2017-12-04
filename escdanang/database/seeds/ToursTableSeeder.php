<?php

use Illuminate\Database\Seeder;

class ToursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tours')->insert([
            ['tour_name' => '', 'description' => '', 'partner_id'=>'1']
            
        ]);
    }
}
