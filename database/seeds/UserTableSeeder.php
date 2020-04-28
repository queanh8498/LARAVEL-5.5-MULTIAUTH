<?php


use App\User;

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	User::truncate();
	    	// create user
	        User::create([
	        	'username' => 'queanh',
	        	'email'   =>  'queanh@gmail.com',
	        	'password' => bcrypt('123456'),
	        ]);
    	}
    
}
