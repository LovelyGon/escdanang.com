<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            ['name' => 'hhhhhhh', 'phone' => '0123456789', 'address' => 'aa', 'email'=>'abc2gmail.com', 'facebook'=>'']
        ]);
    }
}
