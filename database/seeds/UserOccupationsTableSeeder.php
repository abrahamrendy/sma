<?php

use Illuminate\Database\Seeder;

class UserOccupationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_occupations')->delete();
        
        \DB::table('user_occupations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Accounting',
                'priority' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Administrative',
                'priority' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Business Development',
                'priority' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Human Resources',
                'priority' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Consulting',
                'priority' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Finance',
                'priority' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Information Technology',
                'priority' => 1,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Legal',
                'priority' => 1,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Marketing',
                'priority' => 1,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Media & Communications',
                'priority' => 1,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Operations',
                'priority' => 1,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Purchasing',
                'priority' => 1,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Quality Assurance',
                'priority' => 1,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Research',
                'priority' => 1,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Others',
                'priority' => 0,
            ),
        ));
        
        
    }
}