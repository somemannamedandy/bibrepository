<?php

use Illuminate\Database\Seeder;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create();
        for($i = 0; $i<50;$i++){
            App\Book::create([

                'titel' => $faker->sentence,
                'auteur'=> $faker->name,
                'isbn'=> $faker->isbn10,
                'jaartal'=> $faker->year,
                'editie'=> $faker->numberBetween(1,5),
                'desc'=> $faker->text,
                /*'photo'=> $faker->photo,*/
            ]);
        }
    }
}
