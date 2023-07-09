<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JobSalaryRange;

class JobSalaryRangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $salary_ranges = [
           [
               'name' => '10000-20000',
           ],
           [
               'name' => '20000-30000',
           ],
           [
               'name' => '30000-40000',
           ],
           [
               'name' => '40000-50000',
           ],
           [
               'name' => '50000-60000',
           ],
           [
               'name' => '70000-80000',
           ],
           [
               'name' => '80000-90000',
           ],
           [
               'name' => '90000-100000',
           ],
           [
               'name' => 'Above 100000',
           ],
        ];

       JobSalaryRange::insert($salary_ranges);
    }
}
