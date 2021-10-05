<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GroupesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('groupes')->delete();
        
        \DB::table('groupes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Pizzas',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Tacos',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Hamburger',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Salade',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Hot Drink',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Limonade',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Glaces',
            ),
        ));
        
        
    }
}