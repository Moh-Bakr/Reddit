<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call(TopicsSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(CommunitiesSeeder::class);
        $this->call(PostsSeeder::class);
        $this->call(PostVotesSeeder::class);
    }
}
