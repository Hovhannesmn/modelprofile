<?php

use Illuminate\Database\Seeder;
use App\Model\Size;
class SizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Size::create([
            'name' => 'S',
            'slug' => 'smole'
        ]);
        Size::create([
            'name' => 'M',
            'slug' => 'middle'
        ]);
        Size::create([
            'name' => 'L',
            'slug' => 'large'
        ]);
        Size::create([
            'name' => 'XL',
            'slug' => 'X-large'
        ]);
        \DB::table('sizes')->insert([
            'name' => 'FS',
            'slug' => 'F-smole'
        ]);

    }
}
