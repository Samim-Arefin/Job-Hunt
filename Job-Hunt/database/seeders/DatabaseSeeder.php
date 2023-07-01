<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        AdminSeeder::class;
        PageHomeSeeder::class;
        JobCategorySeeder::class;
        WhyChooseItemSeeder::class;
        TestimonialSeeder::class;
        TermPageSeeder::class;
        PrivacyPageSeeder::class;
        ContactPageSeeder::class;
        PackageSeeder::class;
    }
}
