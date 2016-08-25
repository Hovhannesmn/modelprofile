<?php

use Illuminate\Database\Seeder;

class Product_colorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
   
        for ($i = 1; $i <= 20; $i++) {
            for ($j = 1; $j < rand(2, 4); $j++) {
                \DB::table('product_color')->insert([

                    'product_id' => $i,
                    'color_id' => $j

                ]);
            }
        }
    }
}
