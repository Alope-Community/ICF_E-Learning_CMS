<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                'title' => 'Pengenalan Pemrograman',
                'slug' => 'pengenalan-pemrograman',
                'description' => 'Pelajari dasar-dasar pemrograman menggunakan Python.',
                'category_id' => 1,
                'body' => '<p><strong>Ini adalah header</strong></p>',
                'user_id' => 2,
                'course_code' => Str::upper(Str::random(6)),
            ],
            [
                'title' => 'Pemrograman Berorientasi Objek',
                'slug' => 'pemrograman-berorientasi-objek',
                'description' => 'Mendalami konsep OOP menggunakan Java.',
                'category_id' => 2,
                'body' => '<p><strong>Ini adalah header</strong></p>',
                'user_id' => 2,
                'course_code' => Str::upper(Str::random(6)),
            ],
            [
                'title' => 'Pengembangan Web dengan HTML & CSS',
                'slug' => 'pengembangan-web-html-css',
                'description' => 'Belajar membuat website menggunakan HTML dan CSS.',
                'category_id' => 3,
                'body' => '<p><strong>Ini adalah header</strong></p>',
                'user_id' => 2,
                'course_code' => Str::upper(Str::random(6)),
            ],
            [
                'title' => 'JavaScript untuk Pemula',
                'slug' => 'javascript-untuk-pemula',
                'description' => 'Pelajari dasar-dasar JavaScript.',
                'category_id' => 5,
                'body' => '<p><strong>Ini adalah header</strong></p>',
                'user_id' => 2,
                'course_code' => Str::upper(Str::random(6)),
            ],
            [
                'title' => 'Pengembangan Full-Stack',
                'slug' => 'pengembangan-full-stack',
                'description' => 'Eksplor pengembangan full-stack dengan stack MERN.',
                'category_id' => 6,
                'body' => '<p><strong>Ini adalah header</strong></p>',
                'user_id' => 2,
                'course_code' => Str::upper(Str::random(6)),
            ],
            [
                'title' => 'Struktur Data dan Algoritma',
                'slug' => 'struktur-data-dan-algoritma',
                'description' => 'Kuasi struktur data dan algoritma menggunakan C++.',
                'category_id' => 7,
                'body' => '<p><strong>Ini adalah header</strong></p>',
                'user_id' => 2,
                'course_code' => Str::upper(Str::random(6)),
            ],
            [
                'title' => 'Pengembangan Aplikasi Mobile',
                'slug' => 'pengembangan-aplikasi-mobile',
                'description' => 'Bangun aplikasi mobile menggunakan Flutter.',
                'category_id' => 8,
                'body' => '<p><strong>Ini adalah header</strong></p>',
                'user_id' => 2,
                'course_code' => Str::upper(Str::random(6)),
            ],
            [
                'title' => 'Pengembangan Backend dengan Node.js',
                'slug' => 'pengembangan-backend-nodejs',
                'description' => 'Pelajari pemrograman backend menggunakan Node.js.',
                'category_id' => 9,
                'body' => '<p><strong>Ini adalah header</strong></p>',
                'user_id' => 2,
                'course_code' => Str::upper(Str::random(6)),
            ],
            [
                'title' => 'Manajemen Basis Data',
                'slug' => 'manajemen-basis-data',
                'description' => 'Pahami basis data relasional dengan SQL.',
                'category_id' => 10,
                'body' => '<p><strong>Ini adalah header</strong></p>',
                'user_id' => 2,
                'course_code' => Str::upper(Str::random(6)),
            ],
            [
                'title' => 'Pengembangan API',
                'slug' => 'pengembangan-api',
                'description' => 'Bangun dan integrasikan API menggunakan Laravel.',
                'category_id' => 11,
                'body' => '<p><strong>Ini adalah header</strong></p>',
                'user_id' => 2,
                'course_code' => Str::upper(Str::random(6)),
            ],
            [
                'title' => 'Kontrol Versi dengan Git',
                'slug' => 'kontrol-versi-dengan-git',
                'description' => 'Pelajari Git dan GitHub untuk kontrol versi.',
                'category_id' => 12,
                'body' => '<p><strong>Ini adalah header</strong></p>',
                'user_id' => 2,
                'course_code' => Str::upper(Str::random(6)),
            ],
            [
                'title' => 'Dasar-Dasar DevOps',
                'slug' => 'dasar-dasar-devops',
                'description' => 'Pahami dasar-dasar alat dan praktik DevOps.',
                'category_id' => 13,
                'body' => '<p><strong>Ini adalah header</strong></p>',
                'user_id' => 2,
                'course_code' => Str::upper(Str::random(6)),
            ],
            [
                'title' => 'Dasar-Dasar Machine Learning',
                'slug' => 'dasar-dasar-machine-learning',
                'description' => 'Pengenalan konsep Machine Learning menggunakan Python.',
                'category_id' => 14,
                'body' => '<p><strong>Ini adalah header</strong></p>',
                'user_id' => 2,
                'course_code' => Str::upper(Str::random(6)),
            ],
            [
                'title' => 'Dasar-Dasar Keamanan Siber',
                'slug' => 'dasar-dasar-keamanan-siber',
                'description' => 'Pelajari dasar-dasar pengamanan perangkat lunak dan jaringan.',
                'category_id' => 15,
                'body' => '<p><strong>Ini adalah header</strong></p>',
                'user_id' => 2,
                'course_code' => Str::upper(Str::random(6)),
            ],
            [
                'title' => 'Komputasi Awan dengan AWS',
                'slug' => 'komputasi-awan-dengan-aws',
                'description' => 'Pengenalan komputasi awan menggunakan layanan AWS.',
                'category_id' => 16,
                'body' => '<p><strong>Ini adalah header</strong></p>',
                'user_id' => 2,
                'course_code' => Str::upper(Str::random(6)),
            ],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}
