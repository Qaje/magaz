<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=0; $i < 5; $i++) { 
            \DB::table('rols')->insert(
                array(
                    'name' => $faker->randomElement($array = array ('administrador','supervisor')),
                    'description' => $faker->catchPhrase,
                    /* 'bhabilitado' => $faker->randomElement($array = array ('1','0')), */
                ));
        }
    }
}
