<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("categories")->insert([
            [
                "category" => "主食"
            ],
            [
                "category" => "主菜"
            ],
            [
                "category" => "副菜"
            ],
        ]);
    }
}
