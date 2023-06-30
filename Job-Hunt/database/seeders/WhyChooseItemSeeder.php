<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WhyChooseItem;

class WhyChooseItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $why_choose_items = [
           [
               'heading' => 'Quick Apply',
               'text' => 'You can just create your account in our website and apply for desired job very quickly.',
               'icon' => 'fas fa-briefcase'
           ],
           [
               'heading' => 'Search Tool',
               'text' => 'We provide a perfect and advanced search tool for job seekers, employers or companies.',
               'icon' => 'fas fa-search'
           ],
           [
               'heading' => 'Best Companies',
               'text' => ' The best and reputed worldwide companies registered here and so you will get the quality jobs.',
               'icon' => 'fas fa-share-alt'
           ],
        ];

       WhyChooseItem::insert($why_choose_items);
    }
}
