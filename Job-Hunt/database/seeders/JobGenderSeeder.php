<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JobGender;

class JobGenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $genders = [
           [
               'name' => 'Male',
           ],
           [
               'name' => 'Female',
           ],
        ];

       JobGender::insert($genders);
    }
}
