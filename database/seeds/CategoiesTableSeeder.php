<?php

use Illuminate\Database\Seeder;
use App\Model\Category;
class CategoiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'clothing',
            'slug' => 'Clothing'

        ]);

        Category::create([
            'name' => 'watches',
            'slug' => 'Watches'
        ]);
    }
}
