<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Category::create([
            'name' => 'Electrical',
            'slug' => 'electrical'
        ]);

        \App\Category::create([
            'name' => 'Civil',
            'slug' => 'civil'
        ]);

        \App\Category::create([
            'name' => 'Mechanical',
            'slug' => 'mechanical'
        ]);
        \App\Category::create([
            'name' => 'Systems&Computers',
            'slug' => 'systems&computers'
        ]);
        \App\Category::create([
            'name' => 'Petroleum',
            'slug' => 'petroleum'
        ]);

        \App\Category::create([
            'name' => 'Architecture',
            'slug' => 'architecture'
        ]);
    }
}
