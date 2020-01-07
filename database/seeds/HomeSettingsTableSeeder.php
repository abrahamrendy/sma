<?php

use Illuminate\Database\Seeder;

class HomeSettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('home_settings')->delete();
        
        \DB::table('home_settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'dashboard_title' => 'Lighting Your Pathway',
                'dashboard_image' => '/img/sliderimage-min.png',
                'dashboard_title_description' => 'Stay ahead of today\'s competition through latest industry courses and data-driven contents.',
            ),
        ));
        
        
    }
}