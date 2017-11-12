<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Faker\Factory as MyFaker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = MyFaker::create();
        for ($i = 1; $i < 10; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt($faker->password),
            ]);
        }

    }
}
