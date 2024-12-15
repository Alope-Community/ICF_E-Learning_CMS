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
                'message' => 'PBO biasa digunakan untuk membuat sebuah program dengan konsep yang berbasis objek.',
            ],
            [
                'forum_id' => 1,
                'user_id' => 4,
                'message' => 'Ohh.. gitu ya, okedeh terimakasih...',
            ],
            [
                'forum_id' => 2,
                'user_id' => 2,
                'message' => 'Bisa saja.',
            ]
        ];

        foreach ($discussions as $discussion) {
            Discussion::create($discussion);
        }
    }
}
