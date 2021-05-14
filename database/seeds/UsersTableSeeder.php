<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin@123'),
            'role' => 'admin',
        ]);
        DB::table('users')->insert([
            'name' => 'Test User',
            'email' => 'test@user.com',
            'password' => bcrypt('user@123'),
            'role' => 'user',
        ]);
    }
}
