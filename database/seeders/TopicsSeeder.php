<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TopicsSeeder extends Seeder
{

    public function run()
    {
        Topic::create(['name' => 'programing']);
        Topic::create(['name' => 'Design']);
        Topic::create(['name' => 'Business']);
        Topic::create(['name' => 'seo']);
        Topic::create(['name' => 'random']);
    }
}
