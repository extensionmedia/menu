<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ItemOptionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('item_options')->delete();
        
        \DB::table('item_options')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Sauce Tomate',
                'is_active' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Sauce Algérienne',
                'is_active' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Sauce Normale',
                'is_active' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Tonne',
                'is_active' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Tomate',
                'is_active' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Lebesel',
                'is_active' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Ketchup',
                'is_active' => 1,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Mayonaise',
                'is_active' => 1,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Chi haja fechkel',
                'is_active' => 1,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Chwia dial lemlah',
                'is_active' => 1,
            ),
        ));
        
        
    }
}