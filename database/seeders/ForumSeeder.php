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
                'title' => 'Apakah kita harus belajar Bahasa Indonesia?'
            ],
            [
                'course_id' => 2,
                'title' => 'Apakah bahasa Indonesia sering dipakai di mancanegara?'
            ],
            [
                'course_id' => 3,
                'title' => 'Sejarah dunia apa yang hingga kini belum terungkap?'
            ],
        ];

        foreach ($forums as $forum) {
            Forum::create($forum);
        }
    }
}
