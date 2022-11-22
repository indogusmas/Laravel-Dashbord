<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

         $faker = Faker::create();
        // foreach (range(1,500) as $index) {
        //     DB::table('employee')->insert([
        //         'firstname' => $faker->firstName,
        //         'lastname'  => $faker->lastName,
        //         'email'     => $faker->email,
        //         'dob'       => $faker->date($format = 'D-m-y', $max = '2010',$min = '1980')
        //     ]);
        // }

        foreach(range(1,1000) as $index){
            DB::table('product')->insert([
                'name' => $faker->words(2,true),
                'description' => $faker->sentence(10)
            ]);
        }

    }
}
