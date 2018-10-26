<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
        	'name' => 'user',
        	'display_name' => 'Cộng tác viên',
        	'description' => 'Quản lý bài viết cá nhân'
        ]);
    }
}
