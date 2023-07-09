<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CompanyLocation;

class CompanyLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $company_locations = [
           [
               'name' => 'Rajshahi',
           ],
           [
               'name' => 'Dhaka',
           ],
           [
               'name' => 'Barisal',
           ],
           [
               'name' => 'Chittagong',
           ],
           [
               'name' => 'Mymensingh',
           ],
           [
               'name' => 'Rangpur',
           ],
           [
               'name' => 'Khulna',
           ],
           [
               'name' => 'Sylhet',
           ],
        ];

       CompanyLocation::insert($company_locations);
    }
}
