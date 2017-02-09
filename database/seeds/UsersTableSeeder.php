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
        
        foreach(range(1, 20) as $index)
        {
            DB::table('users')->insert([
                'name' => $faker->name(),
                'email' => $faker->safeEmail(),
                'password' => Hash::make('secretpassword'),
                'created_at' => 'now()',
                'updated_at' => 'now()',
            ]);
        }
    }
}
