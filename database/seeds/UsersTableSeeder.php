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
        $users = [
            [
                'name' => 'Admin Mybook',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('my123'),
                'account_status' => 1,

                'name' => 'Member Mybook',
                'email' => 'member@gmail.com',
                'password' => bcrypt('member'),
                'account_status' => 2,
            ]
        ];

        User::insert($users);
    }
}
