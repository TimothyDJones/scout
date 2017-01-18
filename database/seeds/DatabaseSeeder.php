<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->UsersTableSeeder();
    }
    
    private function UsersTableSeeder() {
    	Model::unguard();
    	
    	DB::table('users')->delete();
    	
    	$users = array(
    		['name' => 'Spongebob Squarepants', 'email' => 'pineapple@underthesea.com', 'password' => Hash::make('secret')],
    		['name' => 'Squidward Tentacles', 'email' => 'squiddy@underthesea.com', 'password' => Hash::make('secret')],
    		['name' => 'Patrick Star', 'email' => 'patrick@underthesea.com', 'password' => Hash::make('secret')],
    		['name' => 'Mr. Krabs', 'email' => 'krusty@underthesea.com', 'password' => Hash::make('secret')],
    	);
    	
    	foreach ($users as $user) {
    		User::create($user);
    	}
    	
    	Model::reguard();
    	
    }
}
