<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert([
            ['title' => 'hhhhhhh', 'description' => 'kkkkkkkkkkk', 'image' => '', 'submit_date'=>'30-11-2017', 'content'=>'dddd', 'user_id'=>'1']
        ]);
    }
}
