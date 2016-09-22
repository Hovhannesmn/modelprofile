<?php

use Illuminate\Database\Seeder;
use App\Model\Subcategory;
class SubcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subcategory::create([
            'name' => 'Digital',
            'slug' => 'Digital',
            'category_id' => 2,
//           'members'    => 1,
        ]);

        Subcategory::create([
            'name' => 'Watch Cases',
            'slug' => 'WatchCases',
            'category_id' => 2,
//           'members'    => 1,
        ]);

        Subcategory::create([
            'name' => 'Analog',
            'slug' => 'Analog',
            'category_id' => 2,
//           'members'    => 1,
        ]);
   
     Subcategory::create([
         'name' => 'Chronograph',
         'slug' => 'Chronograph',
         'category_id' => 2,
//           'members'    => 1,
     ]);

     Subcategory::create([
         'name' => 'Track Wear',
         'slug' => 'TrackWear',
          'category_id' => 1,
//           'members'    => 1,
     ]);
         Subcategory::create([
             'name' => 'Suits & Blazers',
             'slug' => 'Suits&Blazers',
              'category_id' => 1,
//                'members'    => 1,

         ]);
         Subcategory::create([
             'name' => 'Formal Trousers',
             'slug' => 'FormalTrousers',
             'category_id' => 1,
//             'members'    => 1,


         ]);
         Subcategory::create([
             'name' => 'Formal Shirts',
             'slug' => 'FormalShirts',
             'category_id' => 1,
//             'members'    => 1,


         ]);
           Subcategory::create([
               'name' => 'Jeans',
               'slug' => 'Jeans',
               'category_id' => 1,
//               'members'    => 1,


           ]);
           Subcategory::create([
               'name' => 'Casual Trousers',
               'slug' => 'CasualTrousers',
               'category_id' => 1,
//               'members'    => 1,


           ]);
        Subcategory::create([
            'name' => 'Polos & Tees',
            'slug' => 'Polos&Tees',
            'category_id' => 1,
//            'members'    => 1,


        ]);

  
    }
}
