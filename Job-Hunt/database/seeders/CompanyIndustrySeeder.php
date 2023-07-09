<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CompanyIndustry;

class CompanyIndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $company_industries = [
           [
               'name' => 'IT Firm',
           ],
           [
               'name' => 'Software Company',
           ],
           [
               'name' => 'Accounting Firm',
           ],
           [
               'name' => 'Real State Company',
           ],
        ];

       CompanyIndustry::insert($company_industries);
    }
}
