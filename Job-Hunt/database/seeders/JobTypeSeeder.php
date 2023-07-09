<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JobType;

class JobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
           [
               'name' => 'Full Time',
           ],
           [
               'name' => 'Part Time',
           ],
           [
               'name' => 'Internship',
           ],
           [
               'name' => 'Contractual',
           ],
        ];

       JobType::insert($types);
    }
}
