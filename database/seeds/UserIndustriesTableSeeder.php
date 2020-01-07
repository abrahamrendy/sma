<?php

use Illuminate\Database\Seeder;

class UserIndustriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_industries')->delete();
        
        \DB::table('user_industries')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Aerospace Engineering',
                'priority' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Chemicals',
                'priority' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Cities, Infrastructure & Industrial Solutions',
                'priority' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Clean Energy',
                'priority' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Consumer Business/Goods',
                'priority' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Content and Media',
                'priority' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Electronics',
                'priority' => 1,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Energy',
                'priority' => 1,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Environment and Water',
                'priority' => 1,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Healthcare',
                'priority' => 1,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Non-Profit',
                'priority' => 1,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Information Technology',
                'priority' => 1,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Logistics and Supply Chain Management',
                'priority' => 1,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Marine and Offshore Engineering',
                'priority' => 1,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Medical Technology',
                'priority' => 1,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Pharmaceuticals and Biotechnology',
                'priority' => 1,
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Precision Engineering',
                'priority' => 1,
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Professional Services',
                'priority' => 1,
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Others',
                'priority' => 0,
            ),
        ));
        
        
    }
}