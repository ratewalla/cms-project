<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

        // creates 10 users
        // factory(User::class,10)->create(); 

        // 'each' function has a callback, can pull a user and save it as an instance ($user) and access its relationship
        // assigns and saves post to user
        factory(User::class,90)->create()->each(function($user){
            $user->posts()->save(factory(Post::class)->make());
        });

    }
}
