<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Margarita',
                'image' => '',
                'groupe_id' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Fruit de Mer',
                'image' => '',
                'groupe_id' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Tacos 1',
                'image' => '',
                'groupe_id' => 2,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Tacos 2',
                'image' => '',
                'groupe_id' => 2,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Tacos 3',
                'image' => '',
                'groupe_id' => 2,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Tacos 3',
                'image' => '',
                'groupe_id' => 2,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Hamburger',
                'image' => '',
                'groupe_id' => 3,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Hamburger test',
                'image' => '',
                'groupe_id' => 3,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Hamburger 45',
                'image' => '',
                'groupe_id' => 3,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Hamburger zakaria',
                'image' => '',
                'groupe_id' => 3,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Salade Niçoise',
                'image' => '',
                'groupe_id' => 4,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Salade Marocaine',
                'image' => '',
                'groupe_id' => 4,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Salade Mziwna',
                'image' => '',
                'groupe_id' => 4,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Atay khdar',
                'image' => '',
                'groupe_id' => 5,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Cafe Noire',
                'image' => '',
                'groupe_id' => 5,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Lipton',
                'image' => '',
                'groupe_id' => 5,
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'CocaCola',
                'image' => '',
                'groupe_id' => 6,
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Bul de grace',
                'image' => '',
                'groupe_id' => 7,
            ),
        ));
        
        
    }
}