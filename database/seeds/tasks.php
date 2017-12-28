<?php

use Illuminate\Database\Seeder;

class tasks extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tasks')->insert([
            'title' => str_random(10),
            'descriptions' => str_random(20),
            'author' => str_random(6),
            'created_at' => '2017-12-28 00:00:00',
            'updated_at' => '2017-12-28 00:00:00',
        ]);
    }
}
