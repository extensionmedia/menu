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
                'password' => '$2y$10$uIG0o87PGmTS9rNWU4rb8egAw/ecbZDH9I0D8ILTuwalAWrOwNWkq',
                'remember_token' => NULL,
                'created_at' => '2021-11-10 13:16:28',
                'updated_at' => '2021-12-13 22:28:57',
                'is_admin' => 1,
                'image' => '/storage/users/0917fc48-a627-44b7-a8da-33700df049ed/1639434503.png',
                'is_active' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'zakaria',
                'email' => 'tagitzakaria@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$3cre9lZFZO2.tZG8RBR.2OxaNsPADCjKwTToYNt2OMlKjceWA.aKy',
                'remember_token' => 'T9U6tU6roQyaDhTSCKtwkGziMQcX3VDMt9aSEdX48hiauhjUZdw1EctDfm2s',
                'created_at' => '2021-11-10 13:35:13',
                'updated_at' => '2021-12-13 22:28:48',
                'is_admin' => 1,
                'image' => '/storage/users/6a7fdb0f-cf5c-4b0d-9134-c9e802181e28/1639434517.png',
                'is_active' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'test',
                'email' => 'test@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$iVm0UjvFqxLt2EChQ.Z1O.uG95QyqkuPWFWvg8nd1IMxX7pic4K5.',
                'remember_token' => NULL,
                'created_at' => '2021-12-14 13:00:50',
                'updated_at' => '2021-12-14 13:00:50',
                'is_admin' => 0,
                'image' => 'https://cdn-icons-png.flaticon.com/512/219/219983.png',
                'is_active' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'ali',
                'email' => 'alierrabbani@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$86PC3sPwZnHmOY4mszG3sOX2Wz2BOGtMYWl5La2sMoxj/iQmwyk5O',
                'remember_token' => 'W68cGuHnWaJwVUIOprHuJfSNCEiQUW9pIs8pOiFlrNhPM5966VgPUtrnW8k2',
                'created_at' => '2021-12-14 17:22:00',
                'updated_at' => '2021-12-14 17:22:00',
                'is_admin' => 0,
                'image' => 'https://cdn-icons-png.flaticon.com/512/219/219983.png',
                'is_active' => 1,
            ),
        ));
        
        
    }
}