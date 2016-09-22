<?php

use Illuminate\Database\Seeder;
use App\Model\Color;
class ColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Color::create([
            'name' => 'red',
            'color_code' => '#ec191f'
        ]);
        Color::create([
            'name' => 'blue',
            'color_code' => '#0f87ef'
        ]);
        Color::create([
            'name' => 'black',
            'color_code' => '#333'
        ]);
    }
}
