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
                'name' => 'Pizza',
                'image' => 'https://img.freepik.com/photos-gratuite/vue-dessus-pizza-au-pepperoni-coupee-six-tranches_141793-2157.jpg?size=626&ext=jpg',
                'level' => 1,
                'is_active' => 1,
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'Tacos',
                'image' => 'https://assets.myfoodandfamily.com/adaptivemedia/rendition/id_3566926e794027c9fd994bec11ad21db96b38868/ht_650/wd_1004/name_./grilled-mexican-panini',
                'level' => 3,
                'is_active' => 1,
            ),
            2 => 
            array (
                'id' => 7,
                'name' => 'Hamburger',
                'image' => 'https://media.istockphoto.com/photos/hamburger-with-cheese-and-french-fries-picture-id1188412964?k=20&m=1188412964&s=612x612&w=0&h=Ow-uMeygg90_1sxoCz-vh60SQDssmjP06uGXcZ2MzPY=',
                'level' => 7,
                'is_active' => 1,
            ),
            3 => 
            array (
                'id' => 11,
                'name' => 'Salades',
                'image' => 'https://cdn.bioalaune.com/img/article/thumb/900x500/36524-etiquetage-alimentaire-trompeur-industriels.png',
                'level' => 11,
                'is_active' => 1,
            ),
            4 => 
            array (
                'id' => 14,
                'name' => 'Boissons Chauds',
                'image' => 'https://www.dunesdeserts.com/wp-content/uploads/2019/03/THE-A-LA-MENTHE-MAROC-12.5.jpg',
                'level' => 14,
                'is_active' => 1,
            ),
            5 => 
            array (
                'id' => 17,
                'name' => 'Boissons Froids',
                'image' => 'https://assets.bwbx.io/images/users/iqjWHBFdfxIU/iSOeWv5_Qtrw/v1/1000x-1.jpg',
                'level' => 17,
                'is_active' => 1,
            ),
        ));
        
        
    }
}