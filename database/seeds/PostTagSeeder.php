<?php

use Illuminate\Database\Seeder;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $postTag = [];

        for ($i =0; $i < 20; $i ++){
            $postTag[] = [
                'post_id' => rand(1, 50),
                'tag_id' => rand(1,10),
            ];
        }

        \DB::table('post_tag')->insert($postTag);
    }
}
