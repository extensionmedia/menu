<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('users')->delete();

        \DB::table('users')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'yassine',
                'email' => 'elmeftouhi@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$xfpB.6mXL1m/0ZvumisdVek2xL/Dv0rDEKcJaXWLlJvpauKUnsmJK',
                'remember_token' => NULL,
                'created_at' => '2021-11-11 14:40:15',
                'updated_at' => '2021-11-11 14:40:15',
                'is_admin'      =>  true,
                'is_active'      =>  true,
                'image'         =>  'https://cdn-icons-png.flaticon.com/512/219/219983.png'
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'souad',
                'email' => 'souad@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$xfpB.6mXL1m/0ZvumisdVek2xL/Dv0rDEKcJaXWLlJvpauKUnsmJK',
                'remember_token' => NULL,
                'created_at' => '2021-11-11 14:40:15',
                'updated_at' => '2021-11-11 14:40:15',
                'is_admin'      =>  false,
                'is_active'      =>  true,
                'image'         =>  'https://cdn-icons-png.flaticon.com/512/219/219983.png'
            ),
        ));


    }
}
