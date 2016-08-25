<?php

use Illuminate\Database\Seeder;
use App\Model\Product;
class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    function randomText($length){
        $characters = 'ab cdef ghij k l m n op qr st u v wx yz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    public function run()
    {
        for ($i=1; $i<=20; $i++ ) {
            Product::create([
                'name' => $this->randomText(30),
                'slug' => 'smole',
                'origin_id' => rand(1, 200),
                'producted_id' => rand(1, 200),
                'price' => rand(50, 500),
                'description' => $this->randomText(400),
                'subcat_id' => rand(1, 11),
                'user_id'    => rand(1, 3)
            ]);
        }
    }
}
