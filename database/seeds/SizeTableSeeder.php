<?php

use Illuminate\Database\Seeder;

class SizeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 10;
        for ($i=0; $i < $count; $i++) {
            DB::table('size')->insert([
                'name_size' => 'XL - ' . $i,
                'des_size' => 'Test 123',
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
