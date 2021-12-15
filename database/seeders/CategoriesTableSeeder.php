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
                'name' => 'sandwich',
                'image' => 'https://menu.soukexpress.ma/storage/categories/51bd6c0e-a1b8-4f2b-a969-4a813bdfb164/1636140903.jpg',
                'level' => 1,
                'is_active' => 1,
            ),
            1 =>
            array (
                'id' => 3,
                'name' => 'Tacos',
                'image' => 'https://menu.soukexpress.ma/storage/categories/69670985-8d25-47a4-b441-8cfcf0540ea2/1636812596.png',
                'level' => 9,
                'is_active' => 1,
            ),
            2 =>
            array (
                'id' => 7,
                'name' => 'whopper burger',
                'image' => 'https://menu.soukexpress.ma/storage/categories/70105c99-4585-468b-8000-b2640e8af811/1636741985.png',
                'level' => 3,
                'is_active' => 1,
            ),
            3 =>
            array (
                'id' => 11,
                'name' => 'Salades',
                'image' => 'https://menu.soukexpress.ma/storage/categories/626ad6cc-c311-43a4-b6bb-39eea511b076/1637090980.jpg',
                'level' => 12,
                'is_active' => 1,
            ),
            4 =>
            array (
                'id' => 14,
                'name' => 'manchegas burger',
                'image' => 'https://menu.soukexpress.ma/storage/categories/5083a72a-f73d-4f4f-aa2e-211b0650ea0b/1636742506.png',
                'level' => 5,
                'is_active' => 1,
            ),
            5 =>
            array (
                'id' => 17,
                'name' => 'Boissons Froids',
                'image' => 'https://menu.soukexpress.ma/storage/categories/2690f62e-64ee-479c-869d-1cd6fd65b66e/1636811530.png',
                'level' => 17,
                'is_active' => 1,
            ),
            6 =>
            array (
                'id' => 22,
                'name' => 'CHICKEN BURGERS',
                'image' => 'https://menu.soukexpress.ma/storage/categories/b7457400-a218-4527-9031-0e505486d2d0/1636742334.png',
                'level' => 4,
                'is_active' => 1,
            ),
            7 =>
            array (
                'id' => 23,
                'name' => 'Shawarma',
                'image' => 'https://menu.soukexpress.ma/storage/categories/099f46a0-4271-4bea-9386-2941cba573fb/1636990849.jpg',
                'level' => 7,
                'is_active' => 1,
            ),
            8 =>
            array (
                'id' => 24,
                'name' => 'wraps',
                'image' => 'https://menu.soukexpress.ma/storage/categories/4e214d0e-6e52-42c6-8381-f23887931f38/1636991018.jpg',
                'level' => 8,
                'is_active' => 1,
            ),
            9 =>
            array (
                'id' => 25,
                'name' => 'Spaghetti',
                'image' => 'https://menu.soukexpress.ma/storage/categories/b7f4b5c2-f50e-4e7a-ab58-fb8ba8f8b17e/1639152174.png',
                'level' => 13,
                'is_active' => 1,
            ),
            10 =>
            array (
                'id' => 26,
                'name' => 'PANINI',
                'image' => 'https://menu.soukexpress.ma/storage/categories/291cdd38-a081-4c7b-ae65-b1bf49d46334/1636924574.jpg',
                'level' => 2,
                'is_active' => 1,
            ),
            11 =>
            array (
                'id' => 27,
                'name' => 'Overlords burger',
                'image' => 'https://menu.soukexpress.ma/storage/categories/b3a542b4-18d8-4548-bad6-26f29ccacedb/1636926415.png',
                'level' => 6,
                'is_active' => 1,
            ),
            12 =>
            array (
                'id' => 28,
                'name' => 'NUGGETS',
                'image' => 'https://menu.soukexpress.ma/storage/categories/7518473a-0a6a-4e92-a917-aba1860c97ab/1636926782.png',
                'level' => 14,
                'is_active' => 1,
            ),
            13 =>
            array (
                'id' => 29,
                'name' => 'Services dans le plat',
                'image' => 'https://menu.soukexpress.ma/storage/categories/9aa99d92-9e96-4a1d-8ca3-6fe568095ccc/1639155290.png',
                'level' => 11,
                'is_active' => 1,
            ),
            14 =>
            array (
                'id' => 30,
                'name' => 'DESSERTS',
                'image' => 'https://menu.soukexpress.ma/storage/categories/a53e1365-bd09-428f-bde4-788cbbe2aa01/1636983686.jpg',
                'level' => 16,
                'is_active' => 1,
            ),
            15 =>
            array (
                'id' => 31,
                'name' => 'jus',
                'image' => 'https://menu.soukexpress.ma/storage/categories/e3fc67ea-512b-48b8-b515-466688f7ab13/1636985414.jpg',
                'level' => 18,
                'is_active' => 1,
            ),
            16 =>
            array (
                'id' => 32,
                'name' => 'boissons chaudes',
                'image' => 'https://menu.soukexpress.ma/storage/categories/34001c3d-13a5-4fe1-ba22-d874564f5f1a/1637708559.jpg',
                'level' => 19,
                'is_active' => 1,
            ),
            17 =>
            array (
                'id' => 33,
                'name' => 'Bière /  énergisantes',
                'image' => 'https://menu.soukexpress.ma/storage/categories/b8c37921-9e0e-4c3a-a0ba-984e072d49e4/1639155039.png',
                'level' => 16,
                'is_active' => 1,
            ),
            18 =>
            array (
                'id' => 34,
                'name' => 'Boissons énergisantes',
                'image' => 'https://menu.soukexpress.ma/storage/categories/cdb010da-376e-4179-9162-d0d06ad10c17/1636989072.jpg',
                'level' => 19,
                'is_active' => 0,
            ),
            19 =>
            array (
                'id' => 35,
                'name' => 'Pizza',
                'image' => 'https://menu.soukexpress.ma/storage/categories/7bcc6374-3cd9-4006-8f9e-899ee4ef0ef5/1637252866.jpg',
                'level' => 10,
                'is_active' => 1,
            ),
            20 =>
            array (
                'id' => 36,
                'name' => 'Charcoal grilled chicken',
                'image' => 'https://menu.soukexpress.ma/storage/categories/6df686b3-1226-4e1a-953f-c398243b5c58/1638125734.png',
                'level' => 15,
                'is_active' => 1,
            ),
        ));


    }
}
