<?php

use Illuminate\Database\Seeder;

class UserReputationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_reputations')->delete();
        
        \DB::table('user_reputations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Beginner',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Advanced',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Expert',
            ),
        ));
        
        
    }
}