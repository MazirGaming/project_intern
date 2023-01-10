<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AttachmentsTableSeeder::class,
            UsersTableSeeder::class,
            CategoriesTableSeeder::class,
            CoursesTableSeeder::class,
            SectionsTableSeeder::class,
            LessonsTableSeeder::class,
            CourseUserTableSeeder::class,
        ]);
    }
}
