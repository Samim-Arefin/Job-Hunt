<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JobCategory;

class JobCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $job_categories = [
           [
               'name' => 'Accounting',
               'icon' => 'fas fa-landmark'
           ],
           [
               'name' => 'Engineering',
               'icon' => 'fas fa-magic'
           ],
           [
               'name' => 'Medical',
               'icon' => 'fas fa-stethoscope'
           ],
           [
               'name' => 'Production',
               'icon' => 'fas fa-sitemap'
           ],
           [
               'name' => 'Data Entry',
               'icon' => 'fas fa-share-alt'
           ],
           [
               'name' => 'Marketing',
               'icon' => 'fas fa-bullhorn'
           ],
           [
               'name' => 'Technician',
               'icon' => 'fas fa-street-view'
           ],
           [
               'name' => 'Security',
               'icon' => 'fas fa-lock'
           ],
           [
               'name' => 'Garments',
               'icon' => 'fas fa-users'
           ],
           [
               'name' => 'Telecommunication',
               'icon' => 'fas fa-vector-square'
           ],
           [
               'name' => 'Education',
               'icon' => 'fas fa-user-graduate'
           ],
           [
               'name' => 'Commercial',
               'icon' => 'fas fa-suitcase'
           ]
        ];

        JobCategory::insert($job_categories);
    }
}
