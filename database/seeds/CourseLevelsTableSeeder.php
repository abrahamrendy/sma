<?php

use Illuminate\Database\Seeder;

class CourseLevelsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('course_levels')->delete();
        
        \DB::table('course_levels')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Beginner',
                'icon' => '/img/courses/beginner-min.png',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Intermediate',
                'icon' => '/img/courses/intermediate-min.png',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Expert',
                'icon' => '/img/courses/expert-min.png',
            ),
        ));
        
        
    }
}