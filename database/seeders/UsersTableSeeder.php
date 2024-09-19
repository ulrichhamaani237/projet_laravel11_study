<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([

            // admins
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
                'role' => 'admin',
                'status' => 'active'
            ],

            // agents
            [
                'name' => 'Agent',
                'username' => 'agent',
                'email' => 'agent@example.com',
                'password' => bcrypt('password'),
                'role' => 'agent',
                'status' => 'active'
            ],


            // users
            [
                'name' => 'User', 
                'username' => 'user', 
                'email' => 'user@example.com', 
                'password' => bcrypt('password'), 
                'role' => 'user',
                'status' => 'active'

            ],

        ]);

    }
}
