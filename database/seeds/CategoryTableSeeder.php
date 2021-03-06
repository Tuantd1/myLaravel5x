<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 50;
        for ($i=0; $i < $count; $i++) {
            DB::table('category')->insert([
                'name_cat' => 'Thoi Trang Thu dong ~ ' . $i,
                'parent_id' => 0,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }

    }
}
