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
        $tag->name = 'Romania';
        $tag->save();

        $tag = new \App\Tag();
        $tag->name = 'International';
        $tag->save();

        $tag = new \App\Tag();
        $tag->name = 'Firme';
        $tag->save();

        $tag = new \App\Tag();
        $tag->name = 'Imobiliare';
        $tag->save();

        $tag = new \App\Tag();
        $tag->name = 'Achizitii';
        $tag->save();

        $tag = new \App\Tag();
        $tag->name = 'Important';
        $tag->save();

        $tag = new \App\Tag();
        $tag->name = 'Altele';
        $tag->save();
    }
}
