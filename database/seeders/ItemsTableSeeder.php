<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('items')->delete();
        
        \DB::table('items')->insert(array (
            0 => 
            array (
                'id' => 1,
                'category_id' => 1,
                'name' => 'Pizza sellam ',
                'image' => 'https://media.istockphoto.com/photos/hamburger-with-cheese-and-french-fries-picture-id1188412964?k=20&m=1188412964&s=612x612&w=0&h=Ow-uMeygg90_1sxoCz-vh60SQDssmjP06uGXcZ2MzPY=',
                'description' => 'hadi wahed pizza mziwna bezzaf',
                'price' => 55.0,
                'is_active' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'category_id' => 1,
                'name' => 'Pizza sellam moyen',
                'image' => 'https://media.istockphoto.com/photos/hamburger-with-cheese-and-french-fries-picture-id1188412964?k=20&m=1188412964&s=612x612&w=0&h=Ow-uMeygg90_1sxoCz-vh60SQDssmjP06uGXcZ2MzPY=',
                'description' => 'pizza dial sellam kbira chwia',
                'price' => 75.0,
                'is_active' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'category_id' => 1,
                'name' => 'pizza fechkel',
                'image' => 'https://media.istockphoto.com/photos/hamburger-with-cheese-and-french-fries-picture-id1188412964?k=20&m=1188412964&s=612x612&w=0&h=Ow-uMeygg90_1sxoCz-vh60SQDssmjP06uGXcZ2MzPY=',
                'description' => 'hadi pizza fechkel osafi',
                'price' => 92.0,
                'is_active' => 1,
            ),
        ));
        
        
    }
}