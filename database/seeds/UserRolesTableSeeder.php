<?php

use Illuminate\Database\Seeder;

class UserRolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_roles')->delete();
        
        \DB::table('user_roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'User',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Admin',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Tester',
            ),
        ));
        
        
    }
}