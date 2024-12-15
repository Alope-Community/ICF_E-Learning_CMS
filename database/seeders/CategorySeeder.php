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
        $matematika = Category::firstOrCreate(
            ['title' => 'Matematika Dasar'],
            [
                'slug' => 'matematika-dasar',
                'description' => 'Pelajari konsep dasar matematika yang penting untuk kehidupan sehari-hari.',
            ]
        );
        
        $bahasa_indonesia = Category::firstOrCreate(
            ['title' => 'Bahasa Indonesia'],
            [
                'slug' => 'bahasa-indonesia',
                'description' => 'Pahami tata bahasa dan keterampilan menulis dalam bahasa Indonesia.',
            ]
        );
        
        $sejarah_dunia = Category::firstOrCreate(
            ['title' => 'Sejarah Dunia'],
            [
                'slug' => 'sejarah-dunia',
                'description' => 'Jelajahi peristiwa penting yang membentuk dunia kita saat ini.',
            ]
        );
        
        $pemrograman = Category::firstOrCreate(
            ['title' => 'Pemrograman untuk Pemula'],
            [
                'slug' => 'pemrograman-untuk-pemula',
                'description' => 'Pelajari dasar-dasar pemrograman menggunakan Python.',
            ]
        );
        
        $seni_kreativitas = Category::firstOrCreate(
            ['title' => 'Seni dan Kreativitas'],
            [
                'slug' => 'seni-dan-kreativitas',
                'description' => 'Eksplorasi seni rupa, musik, dan kreativitas.',
            ]
        );
        
        $ilmu_pengetahuan_alam = Category::firstOrCreate(
            ['title' => 'Ilmu Pengetahuan Alam'],
            [
                'slug' => 'ilmu-pengetahuan-alam',
                'description' => 'Pahami dasar-dasar fisika, kimia, dan biologi.',
            ]
        );
        
        $komputasi = Category::firstOrCreate(
            ['title' => 'Dasar-Dasar Komputasi'],
            [
                'slug' => 'dasar-dasar-komputasi',
                'description' => 'Pengenalan konsep komputasi dan algoritma sederhana.',
            ]
        );
        
        $ekonomi = Category::firstOrCreate(
            ['title' => 'Ekonomi Dasar'],
            [
                'slug' => 'ekonomi-dasar',
                'description' => 'Pelajari prinsip-prinsip dasar ekonomi seperti permintaan dan penawaran.',
            ]
        );
        
        $kewarganegaraan = Category::firstOrCreate(
            ['title' => 'Kewarganegaraan'],
            [
                'slug' => 'kewarganegaraan',
                'description' => 'Pelajari tentang hak dan kewajiban sebagai warga negara.',
            ]
        );
        
        $geografi = Category::firstOrCreate(
            ['title' => 'Geografi'],
            [
                'slug' => 'geografi',
                'description' => 'Pahami fenomena alam dan hubungan manusia dengan lingkungannya.',
            ]
        );
        
        $fisika = Category::firstOrCreate(
            ['title' => 'Fisika Dasar'],
            [
                'slug' => 'fisika-dasar',
                'description' => 'Pelajari prinsip dasar fisika seperti hukum Newton dan energi.',
            ]
        );
        
        $kimia = Category::firstOrCreate(
            ['title' => 'Kimia Dasar'],
            [
                'slug' => 'kimia-dasar',
                'description' => 'Pelajari elemen kimia dan reaksi dasar yang sering dijumpai.',
            ]
        );
        
        $biologi = Category::firstOrCreate(
            ['title' => 'Biologi Dasar'],
            [
                'slug' => 'biologi-dasar',
                'description' => 'Pahami kehidupan dari skala mikroskopis hingga makhluk hidup kompleks.',
            ]
        );
        
        $pemrograman_lanjutan = Category::firstOrCreate(
            ['title' => 'Pemrograman Lanjutan'],
            [
                'slug' => 'pemrograman-lanjutan',
                'description' => 'Tingkatkan kemampuan coding dengan struktur data dan algoritma.',
            ]
        );
        
        $teknologi_informasi = Category::firstOrCreate(
            ['title' => 'Teknologi Informasi'],
            [
                'slug' => 'teknologi-informasi',
                'description' => 'Eksplorasi dasar teknologi informasi dan komunikasi.',
            ]
        );
        
        $keterampilan_hidup = Category::firstOrCreate(
            ['title' => 'Keterampilan Hidup'],
            [
                'slug' => 'keterampilan-hidup',
                'description' => 'Pelajari keterampilan praktis untuk kehidupan sehari-hari.',
            ]
        );
    }
}
