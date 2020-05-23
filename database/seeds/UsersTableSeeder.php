<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=0; $i < 50; $i++) { 
            \DB::table('users')->insert(
                array(
                    'name' => $faker->name,
                    'email' => $faker->email,
                    'password' => $faker->password,
                ));
        }
    }
}
