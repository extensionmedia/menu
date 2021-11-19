<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TablesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tables')->delete();
        
        \DB::table('tables')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Table 1',
                'places' => 0,
                'created_at' => '2021-11-15 23:35:47',
                'updated_at' => '2021-11-15 23:35:47',
            ),
        ));
        
        
    }
}