<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSedder::class);
        // $this->call(PostsTableSeeder::class);
        // $this->call(CategoriesTableSeeder::class);
        // $this->call(TagTableSeeder::class);
    }
}
