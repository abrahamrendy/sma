<?php

use Illuminate\Database\Seeder;

class HomeContentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('home_contents')->delete();
        
        \DB::table('home_contents')->insert(array (
            0 => 
            array (
                'id' => 4,
                'name' => 'Hewlett-Packard',
                'image' => '/img/trusted/hp-min.png',
                'linked_url' => 'https://www.hp.com',
                'type' => 1,
                'description' => NULL,
                'created_by' => 1,
                'priority' => 1,
                'created_time' => '2017-06-06 11:48:29',
                'related_user' => NULL,
            ),
            1 => 
            array (
                'id' => 5,
                'name' => 'Takeda',
                'image' => '/img/trusted/takeda-min.png',
                'linked_url' => 'https://www.takeda.com',
                'type' => 1,
                'description' => NULL,
                'created_by' => 1,
                'priority' => 2,
                'created_time' => '2017-06-06 11:48:29',
                'related_user' => NULL,
            ),
            2 => 
            array (
                'id' => 6,
                'name' => 'Tokio Marine',
                'image' => '/img/trusted/tokiomarine-min.png',
                'linked_url' => 'http://www.tokiomarine.com',
                'type' => 1,
                'description' => NULL,
                'created_by' => 1,
                'priority' => 3,
                'created_time' => '2017-06-06 11:48:29',
                'related_user' => NULL,
            ),
            3 => 
            array (
                'id' => 7,
                'name' => 'P&G',
                'image' => '/img/trusted/pandg-min.png',
                'linked_url' => 'http://www.us.pg.com',
                'type' => 1,
                'description' => NULL,
                'created_by' => 1,
                'priority' => 4,
                'created_time' => '2017-06-06 11:48:29',
                'related_user' => NULL,
            ),
            4 => 
            array (
                'id' => 8,
                'name' => 'SONY',
                'image' => '/img/trusted/sony-min.png',
                'linked_url' => 'https://www.sony.com',
                'type' => 1,
                'description' => NULL,
                'created_by' => 1,
                'priority' => 5,
                'created_time' => '2017-06-06 11:48:29',
                'related_user' => NULL,
            ),
            5 => 
            array (
                'id' => 9,
                'name' => 'Twitter',
                'image' => '/img/trusted/twitter-min.png',
                'linked_url' => 'https://www.twitter.com',
                'type' => 1,
                'description' => NULL,
                'created_by' => 1,
                'priority' => 6,
                'created_time' => '2017-06-06 11:48:29',
                'related_user' => NULL,
            ),
            6 => 
            array (
                'id' => 10,
                'name' => 'Singapore Management University',
                'image' => '/img/trusted/smu-min.png',
                'linked_url' => 'https://www.smu.edu.sg',
                'type' => 1,
                'description' => NULL,
                'created_by' => 1,
                'priority' => 7,
                'created_time' => '2017-06-06 11:48:29',
                'related_user' => NULL,
            ),
            7 => 
            array (
                'id' => 11,
                'name' => 'The Association for Talent Development',
                'image' => '/img/atd-min.png',
                'linked_url' => NULL,
                'type' => 2,
            'description' => 'The Association for Talent Development (ATD) is a professional membership organization supporting those who develop the knowledge and skills of employees in organizations around the world. The association was previously known as the American Society for Training & Development (ASTD).',
                'created_by' => 1,
                'priority' => 1,
                'created_time' => '2017-06-06 11:48:29',
                'related_user' => NULL,
            ),
            8 => 
            array (
                'id' => 12,
                'name' => 'Association of Chartered Certified Accountants',
                'image' => '/img/acca-logo.jpg',
                'linked_url' => 'http://www.accaglobal.com/sg/en.html',
                'type' => 2,
            'description' => 'Association of Chartered Certified Accountants (ACCA) is the global professional accounting body offering the Chartered Certified Accountant qualification (ACCA or FCCA). From June 2016, ACCA recorded that it has 188,000 members and 480,000 students in 178 countries.',
                'created_by' => 1,
                'priority' => 2,
                'created_time' => '2017-06-06 11:48:29',
                'related_user' => NULL,
            ),
            9 => 
            array (
                'id' => 13,
                'name' => 'Tailored Experience',
                'image' => '/img/benefit1-min.png',
                'linked_url' => NULL,
                'type' => 3,
                'description' => 'All contents are customized to ensure a highly relevant learning journey for each user',
                'created_by' => 1,
                'priority' => 1,
                'created_time' => '2017-06-06 11:48:29',
                'related_user' => NULL,
            ),
            10 => 
            array (
                'id' => 14,
                'name' => 'Professional Achievements',
                'image' => '/img/benefit2-min.png',
                'linked_url' => NULL,
                'type' => 3,
                'description' => 'Build your portfolio of learning and highlight your project accomplishments',
                'created_by' => 1,
                'priority' => 2,
                'created_time' => '2017-06-06 11:48:29',
                'related_user' => NULL,
            ),
            11 => 
            array (
                'id' => 15,
                'name' => 'Discover Insights',
                'image' => '/img/benefit3-min.png',
                'linked_url' => NULL,
                'type' => 3,
                'description' => 'Benchmark your competencies or your staff\'s capabilities with the industry to remain competitive',
                'created_by' => 1,
                'priority' => 3,
                'created_time' => '2017-06-06 11:48:29',
                'related_user' => NULL,
            ),
        ));
        
        
    }
}