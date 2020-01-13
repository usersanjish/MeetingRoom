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
            'email' => 'admin@test.app',
            'avatar' => 'Nr9cl.jpeg',
            'is_admin' => 1,
            'password' => bcrypt('12345678'),
        ]);
    }
}
