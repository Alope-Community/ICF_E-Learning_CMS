<?php

namespace Database\Seeders;

use App\Models\SubmitSubmission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubmitSubmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubmitSubmission::create(
            [
                'submission_id' => 1,
                'body' => 'This is body',
                'user_id' => 3,
            ]
        );

        SubmitSubmission::create(
            [
                'submission_id' => 2,
                'body' => 'This is body',
                'user_id' => 4,
            ]
        );

        SubmitSubmission::create(
            [
                'submission_id' => 2,
                'body' => 'This is body',
                'user_id' => 3,
            ]
        );
    }
}
