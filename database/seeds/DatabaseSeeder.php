<?php

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
        // $this->call(UsersTableSeeder::class);
        $this->call(BlogCategoriesSeeder::class);
        factory(\App\Post::class, 50)->create();
        factory(\App\Tag::class, 10)->create();

        $this->call(PostTagSeeder::class);
    }
}
