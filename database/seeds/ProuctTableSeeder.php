<?php

use Illuminate\Database\Seeder;

class ProuctTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 3;
        for ($i=0; $i < $count; $i++) {
            DB::table('product')->insert([
                'name_pd' => 'Quan Jean - ' . $i,
                'des_pd' => 'Test 123',
                'id_cat' => 2,
                'id_size' => 3,
                'price_pd' => 200000,
                'status' => 1,
                'img_pd' => 'test-aosomi-.jpg',
                'qty_pd' => 5,
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
