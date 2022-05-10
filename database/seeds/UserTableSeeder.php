<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<=10;$i++)
        {
            DB::table('users')->insert(
                [
                    'name'=>'Bin_'.$i,
                    'email'=>'Bin_'.$i.'@bin.com',
                    'password'=> bcrypt('123456'),
                    'is_active'=> 1,
                    'is_delete'=> 0,
                    'group_role'=>'none',
                    'last_login_at'=>new DateTime(),
                    'last_login_ip'=>'none',
	            	'created_at' => new DateTime(),
                ]
                );
        }
    }
}
