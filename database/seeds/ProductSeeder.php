<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i<10; $i++){
            DB::table('products')->insert([
                'name' => $faker->name,
                'price' => $faker->randomNumber(5),
                'image' => "public/iuSM85EhFliq3Wopd1C289tPoi3HpHxBIcQvf4s8.jpeg",
                'details' => $faker->catchPhrase,
            ]);
        }
    }
}
