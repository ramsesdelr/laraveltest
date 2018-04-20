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
        factory(App\User::class, 5)->create();        
        factory(App\User::class, 1)->create([
        	'name' =>'Admin User',
        	'email' => 'admin@admin.com',
        	'password' => bcrypt('123456'),
        	'is_admin' => 1,  
        	'is_active' => 1,
        ]);        
    }
}
