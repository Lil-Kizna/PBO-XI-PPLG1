<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name'=>'baju'
        ]);
        
        DB::table('categories')->insert([
            'name'=>'celana'
        ]);

        DB::table('categories')->insert([
            'name'=>'sepatu'
        ]);

        DB::table('categories')->insert([
            'name'=>'hoodie'
        ]);
    }
}
