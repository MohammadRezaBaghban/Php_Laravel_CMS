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
            'id' => 4,
            'name' => 'John',
            'password' => 'dsa123',
            'email' => 'john@john.com'
        ],[
            'id' => 5,
            'name' => 'Jake',
            'password' => 'dsa123',
            'email' => 'jake@john.com'
        ],[
            'id' => 6,
            'name' => 'Matt',
            'password' => 'dsa123',
            'email' => 'Matt@john.com'
        ]);
    }
}
