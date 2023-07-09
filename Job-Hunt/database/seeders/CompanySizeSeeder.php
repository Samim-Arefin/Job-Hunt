<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CompanySize;

class CompanySizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $company_sizes = [
           [
               'name' => '2-5 Persons',
           ],
           [
               'name' => '5-10 Persons',
           ],
           [
               'name' => '10-20 Persons',
           ],
           [
               'name' => '20-50 Persons',
           ],
           [
               'name' => '50-100 Persons',
           ],
           [
               'name' => 'Above 100 Persons',
           ],
        ];

       CompanySize::insert($company_sizes);
    }
}
