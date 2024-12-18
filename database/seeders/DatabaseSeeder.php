<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\SubmitSubmission;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            RolePermissionSeeder::class,
            CategorySeeder::class,
            CourseSeeder::class,
            SubmissionSeeder::class,
            SubmitSubmissionSeeder::class,
            ForumSeeder::class,
            DiscussionSeeder::class,
        ]);
    }
}
