<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Location;

class JobLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $locations = [
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

       Location::insert($locations);
    }
}
