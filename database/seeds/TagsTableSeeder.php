<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag = new \App\Tag();
        $tag->name = 'UK';
        $tag->save();

        $tag = new \App\Tag();
        $tag->name = 'Business';
        $tag->save();

        $tag = new \App\Tag();
        $tag->name = 'Companies';
        $tag->save();

        $tag = new \App\Tag();
        $tag->name = 'Banking';
        $tag->save();

        $tag = new \App\Tag();
        $tag->name = 'Trading';
        $tag->save();

        $tag = new \App\Tag();
        $tag->name = 'Important';
        $tag->save();

        $tag = new \App\Tag();
        $tag->name = 'Other';
        $tag->save();
    }
}
