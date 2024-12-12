<?php

namespace Database\Seeders;

use App\Models\Submission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Submission::firstOrCreate(
            ['title' => 'Python Submission'],
            [
                'description' => 'Python Submission 1',
                'course_id' => 1,
                'deadline' => '2024-12-31 12:00:00',
            ]
        );

        Submission::firstOrCreate(
            ['title' => 'Python Submission 2'],
            [
                'description' => 'Python Submission 2',
                'course_id' => 1,
                'deadline' => '2024-12-31 12:00:00',
            ]
        );

        Submission::firstOrCreate(
            ['title' => 'DevOps Submission'],
            [
                'description' => 'DevOps Submission 1',
                'course_id' => 12,
                'deadline' => '2024-12-31 12:00:00',
            ]
        );
    }
}
