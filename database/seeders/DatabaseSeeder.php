<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
<<<<<<< HEAD
          // ShopsTableSeeder::class,
          // AreasTableSeeder::class,
          // GenresTableSeeder::class,
          LikesTableSeeder::class,
=======
          ShopsTableSeeder::class,
          // AreasTableSeeder::class,
          // GenresTableSeeder::class,
>>>>>>> f59c9375d98b1b3b7acb06a38ee099210ddc88b0
        ]);
    }
}
