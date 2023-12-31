<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Package;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $packages = [
           [
               'name' => 'Basic',
               'price' => 500,
               'days' => 14,
               'time' => '2 Week',
               'total_allowed_jobs' => 10,
               'total_allowed_featured_jobs' => 0,
               'total_allowed_photos' => 0,
           ],
           [
               'name' => 'Standard',
               'price' => 1500,
               'days' => 30,
               'time' => '1 Month',
               'total_allowed_jobs' => 25,
               'total_allowed_featured_jobs' => 5,
               'total_allowed_photos' => 5,
           ],
           [
               'name' => 'Premium',
               'price' => 3000,
               'days' => 60,
               'time' => '2 Month',
               'total_allowed_jobs' => 50,
               'total_allowed_featured_jobs' => 15,
               'total_allowed_photos' => 15,
           ],
        ];

       Package::insert($packages);
    }
}
