<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PageHomeItem;

class PageHomeItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PageHomeItem::create([
            'heading' => 'Find Your Desired Job',
            'text' => 'Search the best, perfect and suitable jobs that matches your skills in your expertise area.',
            'job_title' => 'Job Title',
            'job_category' => 'Job Category',
            'job_location' => 'Job Location',
            'search' => 'Search',
            'background' => 'job-search.jpg',
            'job_category_heading' => 'Job Categories',
            'job_category_subheading' => 'Get the list of all the popular job categories here',
            'job_category_status' => 'Show',
            'why_choose_heading' => 'Why Choose Us',
            'why_choose_subheading' => 'Our Methods to help you build your career in future',
            'why_choose_background' => 'banner3.jpg',
            'why_choose_status' => 'Show',
            'featured_jobs_heading' => 'Featured Jobs',
            'featured_jobs_subheading' => 'Find the awesome jobs that matches your skill',
            'featured_jobs_status' => 'Show',
            'testimonial_background' => 'banner11.jpg',
            'testimonial_status' => 'Show'
        ]);
    }
}
