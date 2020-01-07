<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(CoursesCategoriesTableSeeder::class);
        $this->call(CourseLevelsTableSeeder::class);
        $this->call(CurrenciesTableSeeder::class);
        $this->call(HomeContentsTableSeeder::class);
        $this->call(HomeSettingsTableSeeder::class);
        $this->call(UserIndustriesTableSeeder::class);
        $this->call(UserOccupationsTableSeeder::class);
        $this->call(UserReputationsTableSeeder::class);
        $this->call(UserRolesTableSeeder::class);
    }
}
