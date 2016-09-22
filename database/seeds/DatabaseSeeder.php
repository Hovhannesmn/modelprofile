<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $this->call(ProductsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(Product_colorTableSeeder::class);
        $this->call(Product_sizeTableSeeder::class);
        $this->call(ColorsTableSeeder::class);
        $this->call( ImagesTableSeeder::class);
        $this->call(SizesTableSeeder::class);
        $this->call(CategoiesTableSeeder::class);
        $this->call(SubcategoriesTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(Category_tagTableSeeder::class);


    }
}
