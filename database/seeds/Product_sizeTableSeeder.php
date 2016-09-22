<?php

use Illuminate\Database\Seeder;

class Product_sizeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            for ($j = 1; $j < rand(3, 7); $j++) {
                \DB::table('product_size')->insert([
                  
                        'product_id' => $i,
                        'size_id' => $j
                  
                ]);
            }
        }
    }
    
}
