<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
           [
               'name' => 'Robert Krol',
               'designation' => 'CEO, ABC Company',
               'comment'=> 'Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has. Latine propriae quo no, unum ridens.',
               'photo' => 't1.jpg'
           ],
           [
               'name' => 'Sal Harvey',
               'designation' => 'Director, DEF Company',
               'comment'=> 'Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has. Latine propriae quo no, unum ridens.',
               'photo' => 't2.jpg'
           ]
        ];

       Testimonial::insert($testimonials);
    }
}
