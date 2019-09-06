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
            'name' => 'Ali',
            'email' => 'ali@gmail.com',
            'password' => bcrypt('ali'),
            'phone' => '0123456789',
            'status' => 'active'
        ]);

        DB::table('users')->insert([
            'name' => 'Abu',
            'email' => 'abu@gmail.com',
            'password' => bcrypt('abu'),
            'phone' => '0123456789',
            'status' => 'active'
        ]);

        DB::table('users')->insert([
            'name' => 'Siti',
            'email' => 'siti@gmail.com',
            'password' => bcrypt('siti'),
            'phone' => '0123456789',
            'status' => 'active'
        ]);
    }
}
