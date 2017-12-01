<?php

use Illuminate\Database\Seeder;

class HotelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hotels')->insert([
            ['hotel_name' => '', 'description' => '', 'partner_id'=>'' ]
            
        ]);
    }
}
