<?php

use Illuminate\Database\Seeder;
use App\Model\Tag;
class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
       $data = [
                'Super', 'Men', 'Women', 'Equipment',
                'Best', 'Accessories',
               
                ];
        foreach ($data as $name){
               Tag::create([
                   'name' => $name,
                   'slug' => $name,
               ]);
        }
    }
}
