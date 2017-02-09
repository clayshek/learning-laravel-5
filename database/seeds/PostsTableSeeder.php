<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PostsTableSeeder extends Seeder
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
            DB::table('posts')->insert([
                'user_id' => 2,
                'title' => $faker->sentence(5),
                'body' => $faker->paragraph(5),
                'created_at' => 'now()',
                'updated_at' => 'now()',
            ]);
        }
       
    }
}
