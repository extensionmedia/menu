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
                'id' => 25,
                'name' => 'Extra ketchup',
                'is_active' => 1,
                'price' => 1.0,
            ),
            1 => 
            array (
                'id' => 26,
                'name' => 'Extra moutarde',
                'is_active' => 1,
                'price' => 3.0,
            ),
            2 => 
            array (
                'id' => 28,
                'name' => 'Fanta orange 25cl',
                'is_active' => 1,
                'price' => 0.0,
            ),
            3 => 
            array (
                'id' => 29,
                'name' => 'Coca Cola 25cl',
                'is_active' => 1,
                'price' => 0.0,
            ),
            4 => 
            array (
                'id' => 30,
                'name' => 'Fanta citron 25cl',
                'is_active' => 1,
                'price' => 0.0,
            ),
            5 => 
            array (
                'id' => 32,
                'name' => 'Coca-Cola Zéro 25cl',
                'is_active' => 1,
                'price' => 0.0,
            ),
            6 => 
            array (
                'id' => 33,
                'name' => 'pomme fanta 25cl',
                'is_active' => 1,
                'price' => 0.0,
            ),
            7 => 
            array (
                'id' => 34,
                'name' => 'fromage cheddar',
                'is_active' => 1,
                'price' => 3.0,
            ),
            8 => 
            array (
                'id' => 35,
                'name' => 'la cuisse',
                'is_active' => 1,
                'price' => 0.0,
            ),
            9 => 
            array (
                'id' => 36,
                'name' => 'poitrine',
                'is_active' => 1,
                'price' => 0.0,
            ),
            10 => 
            array (
                'id' => 41,
                'name' => 'bavaria pomme 0,0%',
                'is_active' => 1,
                'price' => 16.0,
            ),
            11 => 
            array (
                'id' => 42,
                'name' => 'San Miguel 0,0%',
                'is_active' => 1,
                'price' => 16.0,
            ),
            12 => 
            array (
                'id' => 43,
                'name' => 'Extra andalouse',
                'is_active' => 1,
                'price' => 2.0,
            ),
            13 => 
            array (
                'id' => 44,
                'name' => 'Extra algérienne',
                'is_active' => 1,
                'price' => 2.0,
            ),
            14 => 
            array (
                'id' => 45,
                'name' => 'barbecue',
                'is_active' => 1,
                'price' => 0.0,
            ),
            15 => 
            array (
                'id' => 46,
                'name' => 'samourai',
                'is_active' => 1,
                'price' => 2.0,
            ),
            16 => 
            array (
                'id' => 47,
                'name' => 'sans ketchup',
                'is_active' => 1,
                'price' => 0.0,
            ),
            17 => 
            array (
                'id' => 48,
                'name' => 'sans Mayonnaise',
                'is_active' => 1,
                'price' => 0.0,
            ),
            18 => 
            array (
                'id' => 49,
                'name' => 'sans carottes',
                'is_active' => 1,
                'price' => 0.0,
            ),
            19 => 
            array (
                'id' => 50,
                'name' => 'sans oignons',
                'is_active' => 1,
                'price' => 0.0,
            ),
            20 => 
            array (
                'id' => 51,
                'name' => 'sans laitue',
                'is_active' => 1,
                'price' => 0.0,
            ),
            21 => 
            array (
                'id' => 52,
                'name' => 'sans cornichon',
                'is_active' => 1,
                'price' => 0.0,
            ),
            22 => 
            array (
                'id' => 53,
                'name' => 'sans olives vertes',
                'is_active' => 1,
                'price' => 0.0,
            ),
            23 => 
            array (
                'id' => 54,
                'name' => 'sans tomates',
                'is_active' => 1,
                'price' => 0.0,
            ),
            24 => 
            array (
                'id' => 55,
                'name' => 'piquante',
                'is_active' => 1,
                'price' => 0.0,
            ),
            25 => 
            array (
                'id' => 56,
                'name' => 'mayonnaise à l\'ail',
                'is_active' => 1,
                'price' => 0.0,
            ),
            26 => 
            array (
                'id' => 57,
                'name' => 'algérienne',
                'is_active' => 1,
                'price' => 0.0,
            ),
            27 => 
            array (
                'id' => 58,
                'name' => 'andalouse',
                'is_active' => 1,
                'price' => 0.0,
            ),
            28 => 
            array (
                'id' => 59,
                'name' => 'Extra mozzarella',
                'is_active' => 1,
                'price' => 5.0,
            ),
            29 => 
            array (
                'id' => 60,
                'name' => 'Extra Frites',
                'is_active' => 1,
                'price' => 7.0,
            ),
            30 => 
            array (
                'id' => 61,
                'name' => 'Extra biggy',
                'is_active' => 1,
                'price' => 3.0,
            ),
            31 => 
            array (
                'id' => 62,
                'name' => 'biggy',
                'is_active' => 1,
                'price' => 0.0,
            ),
            32 => 
            array (
                'id' => 63,
                'name' => 'Extra barbecue',
                'is_active' => 1,
                'price' => 3.0,
            ),
            33 => 
            array (
                'id' => 64,
                'name' => 'Extra Kasher',
                'is_active' => 1,
                'price' => 2.0,
            ),
            34 => 
            array (
                'id' => 65,
                'name' => 'Extra mortadelle',
                'is_active' => 1,
                'price' => 2.0,
            ),
            35 => 
            array (
                'id' => 66,
                'name' => 'ketchup',
                'is_active' => 1,
                'price' => 0.0,
            ),
            36 => 
            array (
                'id' => 67,
                'name' => 'mayonnaise',
                'is_active' => 1,
                'price' => 0.0,
            ),
            37 => 
            array (
                'id' => 68,
                'name' => 'toutes sortes de salade',
                'is_active' => 1,
                'price' => 0.0,
            ),
            38 => 
            array (
                'id' => 69,
                'name' => 'huile pimentée',
                'is_active' => 1,
                'price' => 0.0,
            ),
            39 => 
            array (
                'id' => 70,
                'name' => 'Extra huile pimentée',
                'is_active' => 1,
                'price' => 1.0,
            ),
            40 => 
            array (
                'id' => 71,
                'name' => 'Extra Sauce tomate à la viande hachée',
                'is_active' => 1,
                'price' => 15.0,
            ),
            41 => 
            array (
                'id' => 72,
                'name' => 'Extra champignon',
                'is_active' => 1,
                'price' => 5.0,
            ),
            42 => 
            array (
                'id' => 73,
                'name' => 'Extra parmesan',
                'is_active' => 1,
                'price' => 5.0,
            ),
            43 => 
            array (
                'id' => 74,
                'name' => 'Extra fruits de mer',
                'is_active' => 1,
                'price' => 20.0,
            ),
        ));
        
        
    }
}