<?php

use Illuminate\Database\Seeder;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 		for ($i=1; $i <= 2; $i++) { 
 			DB::table('rooms')->insert([
        		'name' => 'Meeting Room '.$i,
        		'img' =>	'mr-'.$i.'.png',
        	]);
 		}
    }
}
