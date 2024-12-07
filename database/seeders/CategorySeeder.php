<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $python = Category::firstOrCreate(
            ['title' => 'Python'],
            [
                'slug' => 'python',
                'description' => 'Python adalah bahasa pemrograman yang populer dan banyak digunakan.',
            ]

        );

        $java = Category::firstOrCreate(
            ['title' => 'Java'],
            [
                'slug' => 'java',
                'description' => 'Java adalah bahasa pemrograman yang populer dan banyak digunakan untuk membuat aplikasi desktop dan mobile.',
            ]
        );

        $html = Category::firstOrCreate(
            ['title' => 'HTML'],
            [
                'slug' => 'html',
                'description' => 'HTML adalah bahasa markup yang digunakan untuk membuat struktur dan kontent dari halaman web.',
            ]
        );

        $css = Category::firstOrCreate(
            ['title' => 'CSS'],
            [
                'slug' => 'css',
                'description' => 'CSS adalah bahasa styling yang digunakan untuk membuat tampilan dan
                desain dari halaman web.',
            ]
        );

        $javascript = Category::firstOrCreate(
            ['title' => 'JavaScript'],
            [
                'slug' => 'javascript',
                'description' => 'JavaScript adalah bahasa pemrograman yang digunakan untuk membuat interaksi dinamis pada halaman web.',
            ]
        );

        $mern = Category::firstOrCreate(
            ['title' => 'MERN'],
            [
                'slug' => 'mern',
                'description' => 'MERN adalah singkatan dari MongoDB, Express, React, dan Node.js, yang digunakan untuk membuat aplikasi web dinamis.',
            ]
        );

        $cpp = Category::firstOrCreate(
            ['title' => 'C++'],
            [
                'slug' => 'cpp',
                'description' => 'C++ adalah bahasa pemrograman yang digunakan untuk membuat aplikasi sistem operasi dan aplikasi desktop.',
            ]
        );

        $flutter = Category::firstOrCreate(
            ['title' => 'Flutter'],
            [
                'slug' => 'flutter',
                'description' => 'Flutter adalah framework yang digunakan untuk membuat aplikasi mobile dan web dengan menggunakan bahasa pemrograman Dart.',
            ]
        );

        $nodejs = Category::firstOrCreate(
            ['title' => 'Node.js'],
            [
                'slug' => 'nodejs',
                'description' => 'Node.js adalah framework yang digunakan untuk membuat aplikasi web dinamis dengan menggunakan bahasa pemrograman JavaScript.',
            ]
        );

        $sql = Category::firstOrCreate(
            ['title' => 'SQL'],
            [
                'slug' => 'sql',
                'description' => 'SQL adalah bahasa query yang digunakan untuk mengelola data pada database.',
            ]
        );

        $laravel = Category::firstOrCreate(
            ['title' => 'Laravel'],
            [
                'slug' => 'laravel',
                'description' => 'Laravel adalah framework yang digunakan untuk membuat aplikasi web dinamis dengan menggunakan bahasa pemrograman PHP.',
            ]
        );

        $git = Category::firstOrCreate(
            ['title' => 'Git'],
            [
                'slug' => 'git',
                'description' => 'Git adalah sistem kontrol versi yang digunakan untuk mengelola kode sumber dan riwayat perubahan kode.',
            ]
        );

        $devops = Category::firstOrCreate(
            ['title' => 'DevOps'],
            [
                'slug' => 'devops',
                'description' => 'DevOps adalah praktek yang digunakan untuk meningkatkan efisiensi dan efektivitas dalam pengembangan dan pengelolaan aplikasi.',
            ]
        );

        $ml = Category::firstOrCreate(
            ['title' => 'Machine Learning'],
            [
                'slug' => 'machine-learning',
                'description' => 'Machine Learning adalah praktek yang digunakan untuk membuat model yang dapat belajar dari data dan membuat prediksi atau keputusan berdasarkan data tersebut.',
            ]
        );

        $cybersecurity = Category::firstOrCreate(
            ['title' => 'Cybersecurity'],
            [
                'slug' => 'cybersecurity',
                'description' => 'Cybersecurity adalah praktek yang digunakan untuk melindungi sistem komputer dan jaringan dari serangan dan ancaman keamanan.',
            ]
        );

        $cloud = Category::firstOrCreate(
            ['title' => 'Cloud Computing'],
            [
                'slug' => 'cloud-computing',
                'description' => 'Cloud Computing adalah praktek yang digunakan untuk menyimpan dan mengelola data dan aplikasi di internet.',
            ]
        );
    }
}
