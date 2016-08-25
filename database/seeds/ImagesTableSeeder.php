<?php

use Illuminate\Database\Seeder;
use App\Model\Image;
class ImagesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        for($i=1; $i<=20; $i++){
            Image::create([
                'product_id' => $i,
                'user_id'    => 1,
                'is_general' => 1,
                'url'        => '/assets/images/si.jpg',

            ]);
            Image::create([
                'product_id' => $i,
                'user_id'    => 1,
                'is_general' => 0,
                'url'        => '/assets/images/si1.jpg',

            ]);
            Image::create([
                'product_id' => $i,
                'user_id'    => 1,
                'is_general' => 0,
                'url'        => '/assets/images/si2.jpg',

            ]);
        }

    }
}