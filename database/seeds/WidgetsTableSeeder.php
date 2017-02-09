<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class WidgetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
        foreach(range(1, 10) as $index)
        {
            DB::table('widgets')->insert([
                'name' => $faker->sentence(1),
                'details' => $faker->sentence(2),
                'created_at' => 'now()',
                'updated_at' => 'now()',
            ]);
        }
    }
}
