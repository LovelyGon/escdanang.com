<?php

use Illuminate\Database\Seeder;

class VouchersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vouchers')->insert([
            ['discount' => '10%', 'start_date' => '30-11-2017', 'end_date' => '20-12-2017', 'user_id'=> '1']
        ]);
    }
}
