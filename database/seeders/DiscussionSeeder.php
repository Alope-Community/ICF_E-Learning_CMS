<?php

namespace Database\Seeders;

use App\Models\Discussion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiscussionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $discussions = [
            [
                'forum_id' => 1,
                'user_id' => 2,
                'message' => 'Bahasa Indonesia adalah bahasa primer kita, jadi penting untuk kita mempelajari Bahasa Indonesia.',
            ],
            [
                'forum_id' => 1,
                'user_id' => 4,
                'message' => 'Ohh.. gitu ya, okedeh terimakasih...',
            ],
            [
                'forum_id' => 2,
                'user_id' => 2,
                'message' => 'Sesekali Bahasa Indonesia dipelajari di negara-negara asing.',
            ]
        ];

        foreach ($discussions as $discussion) {
            Discussion::create($discussion);
        }
    }
}
