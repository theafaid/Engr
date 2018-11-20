<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Setting::class, 1)->create();
         $this->call(CategorySeeder::class);
         factory(App\User::class, 1)->create();
        factory(App\Post::class, 100)->create();
        factory(App\Tag::class, 20)->create();
        \Artisan::call('cache:clear');

    }
}
