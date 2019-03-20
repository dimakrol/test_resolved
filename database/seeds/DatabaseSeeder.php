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
         $users = factory(App\User::class, 3)->create();
         for($i = 0; $i < 50; $i++) {
             factory(App\Post::class)->create(['user_id' => $users->random()->id]);
         }
    }
}
