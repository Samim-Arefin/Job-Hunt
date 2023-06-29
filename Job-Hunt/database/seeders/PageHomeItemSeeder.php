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
            'background' => 'job-search.jpg'
        ]);
    }
}
