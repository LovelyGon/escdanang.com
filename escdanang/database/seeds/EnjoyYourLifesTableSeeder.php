<?php

use Illuminate\Database\Seeder;

class EnjoyYourLifesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('enjoYourLifes')->insert([
            ['enjoy_name' => 'hhhhhhh', 'description' => '', 'image' => '']
        ]);
    }
}
