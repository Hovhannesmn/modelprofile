<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'Digital',
            'last_name' => 'Digital',
            'contact_phone' => '+' . str_random(10),
            'email' => 'email@email.com',
            'password'    => bcrypt('123456'),
            'remember_token' => str_random(10),
            
        ]);
        User::create([
            'first_name' => 'Digital1',
            'last_name' => 'Digital1',
            'contact_phone' => '+' . str_random(10),
            'email' => 'gmail@gmail.com',
            'password'    => bcrypt('123456'),
            'remember_token' => str_random(10),

        ]);

        User::create([
            'first_name' => 'Digital2',
            'last_name' => 'Digital2',
            'contact_phone' => '+' . str_random(10),
            'email' => 'email2@email.com',
            'password'    => bcrypt('123456'),
            'remember_token' => str_random(10),

        ]);







    }
}
