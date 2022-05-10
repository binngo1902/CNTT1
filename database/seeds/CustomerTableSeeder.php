<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=10;$i<=30;$i++)
        {
            DB::table('mst_customer')->insert(
                [
                    'customer_name'=>'Bin_'.$i,
                    'email'=>'Bin_'.$i.'@bin.com',
                    'tel_num'=> '01234512'.$i,
                    'address'=> $i.' Tan Quy TPHCM',
                    'is_active'=> 1,
	            	'created_at' => new DateTime(),
                ]
                );
        }
    }
}
