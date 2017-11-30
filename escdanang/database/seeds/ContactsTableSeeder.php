<?php

use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->insert([
            ['website' => 'escdanang.com', 'comment' => '', 'customer_id' => '1'],
            
        ]);
    }
}
