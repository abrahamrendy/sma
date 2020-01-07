<?php

use Illuminate\Database\Seeder;

class CoursesCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('courses_categories')->delete();
        
        \DB::table('courses_categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'FEATURED',
                'priority' => 2,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Others',
                'priority' => 0,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Employee Engagement',
                'priority' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Core Value Deployment',
                'priority' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Leadership',
                'priority' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Organizational Change',
                'priority' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Performance Management/ Productivity',
                'priority' => 1,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Professionalism',
                'priority' => 1,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Organizational Design',
                'priority' => 1,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Grooming/Career Development',
                'priority' => 1,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Entrepreneurship',
                'priority' => 1,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Finance',
                'priority' => 1,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Sales/Marketing',
                'priority' => 1,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Team Building & Personal Development',
                'priority' => 1,
            ),
        ));
        
        
    }
}