<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 20; $i++) { 
            DB::table("categories")->insert([
                "name" => "Category".$i,
                "created_at" => date("y-m-d h:m:s",time()),
            ]);
        }
    }
}
