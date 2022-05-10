<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=0; $i <20 ; $i++) {
             DB::table('mst_product')->insert(
                [
                    'product_id' => $i,
                    'product_name'=>'Sản phẩm'.$i,
                    'product_price'=> '123'.$i,
                    'description' => 'Mô tả sản phẩm'.$i,

                    'created_at' => new DateTime(),
                ]
                );
        }
    }
}
