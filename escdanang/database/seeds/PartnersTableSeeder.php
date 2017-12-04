<?php

use Illuminate\Database\Seeder;

class PartnersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('partners')->insert([
            ['company_name' => 'escdanang', 'address' => '37-Lê Lợi', 'email' => 'thuan59.dt@gmail.com', 'website' =>'escdanang.com', 'phone' =>'0121334234', 'partnerType_id' => '1']
        ]);
    }
}
