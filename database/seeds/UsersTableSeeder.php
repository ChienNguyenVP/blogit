<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            // 'name' => str_random(10),
            'name'  => 'admin',
            // 'email' => str_random(10).'@gmail.com',
            'email' => 'chiennguyen@gmail.com',
            'full_name' => 'Chiến Nguyễn',
            'is_admin' => 1,
            'avatar' => '/image/DSC02176.jpg',
            'password' => bcrypt('123456')
        ]);

        // User::create([
        //     'name'  => 'admin',
        //     'email' => 'nguyenmanh0397@gmail.com',
        //     'full_name' => 'Nguyễn Văn Mạnh',
        //     'is_admin' => 0,
        //     'password' => bcrypt('123456')
        // ]);
    }
}
