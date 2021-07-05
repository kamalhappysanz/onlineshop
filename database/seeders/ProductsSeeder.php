<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Products;


class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Products::truncate(); 
        DB::table('products')->insert([
            [
            'name'=>'Plan A',
            'price'=>'1000',
            'description'=>'Plan description'
            ],
            [
            'name'=>'Plan B',
            'price'=>'2000',
            'description'=>'Plan description'
            ],
            [
            'name'=>'Plan C',
            'price'=>'3000',
            'description'=>'Plan description'
            ],
        ]);
    }
}
