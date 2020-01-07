<?php

use Illuminate\Database\Seeder;

class CurrenciesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('currencies')->delete();
        
        \DB::table('currencies')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'USD',
                'symbol' => 'US$',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'SGD',
                'symbol' => 'S$',
            ),
        ));
        
        
    }
}