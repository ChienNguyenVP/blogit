<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tagging_tags')->truncate();
        DB::table('tagging_tagged')->truncate();
    }
}
