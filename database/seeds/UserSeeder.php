<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for($i = 0; $i < 4; $i++){
            \Illuminate\Support\Facades\DB::table('users')->insert([
                'name' => $faker->name,
                'surname' => $faker->lastName,
                'email' => $faker->email(5),
                'password' => bcrypt('pass')

            ]);
        }
    }
}
