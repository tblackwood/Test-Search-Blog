<?php

use Illuminate\Database\Seeder;

class BlogCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [];

        for ($i = 0; $i<6; $i++){
            $cName = 'Category #' . ($i);

            $categories[] = [
                'title' => $cName,
            ];
        }
        \DB::table('categories')->insert($categories);
    }
}
