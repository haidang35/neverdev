<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\BlogTranslation;
use App\Models\Topic;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('topics')->truncate();
        DB::table('blogs')->truncate();
        DB::table('blog_translations')->truncate();
        // \App\Models\User::factory(10)->create();
        // Topic::factory(20)->create();
        // Blog::factory(100)->create();
        // BlogTranslation::factory(1000)->create();
    }
}
