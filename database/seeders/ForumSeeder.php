<?php

namespace Database\Seeders;

use App\Models\Forum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ForumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $forums = [
            [
                'course_id' => 2,
                'title' => 'PBO itu untuk apa?'
            ],
            [
                'course_id' => 2,
                'title' => 'Apakah konsep PBO bisa digunakan di javascript?'
            ],
            [
                'course_id' => 3,
                'title' => 'Apakah masih worth it belajar html & css di zaman sekarang?'
            ],
        ];

        foreach ($forums as $forum) {
            Forum::create($forum);
        }
    }
}
