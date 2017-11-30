<?php

use Illuminate\Database\Seeder;

class RecruitmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recruitments')->insert([
            ['comany_name' => 'abc', 'title' => 'tuyển dụng', 'submit_date' => '30-11-2017', 'description'=>'aaaaaaaaaaa', 'content'=>'abbbbbbbbbbb','position'=>'aaaaa','expiry_date'=>'20-12-2017','user_id'=>'1']
        ]);
    }
}
