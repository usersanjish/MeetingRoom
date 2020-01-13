<?php

use Illuminate\Database\Seeder;

class BookingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bookings')->insert([
        	'user_id' => 1,
        	'room_id' => 1,
        	'title' => 'Lorem Ipsum',
        	'start' => '2020-01-16 08:00',
        	'end'	=> '2020-01-16 17:00', 
        	'description' => 'Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне.'
        ]);
    }
}
