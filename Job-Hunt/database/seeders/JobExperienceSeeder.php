<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JobExperience;

class JobExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $experiences = [
           [
               'name' => 'Fresher',
           ],
           [
               'name' => '1 Year',
           ],
           [
               'name' => '2 Years',
           ],
           [
               'name' => '3 Years',
           ],
           [
               'name' => '4 Years',
           ],
        ];

       JobExperience::insert($experiences);
    }
}
