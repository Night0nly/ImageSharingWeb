<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<=320;$i++){
            $image = new \App\Image();
            $image->title = "Title $i";
            $image->caption = "Caption photo $i";
            $image->vote_count = 0;
            $image->url_path = "1 ($i).jpg";
            $image->save();
        }
    }
}
