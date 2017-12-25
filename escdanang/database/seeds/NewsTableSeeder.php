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
            ['title' => 'hhhhhhh', 'short_description' => 'kkkkkkkkkkk','type' => 'news', 'image' => '', 'content'=>'dddd', 'user_id'=>'1','type' => 'news', 'start_date' => '2017-10-12', 'end_date' => '2017-10-17']
        ]);
    }
}
