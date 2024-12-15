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
                'title' => 'Matematika Dasar',
                'slug' => 'matematika-dasar',
                'description' => 'Pelajari konsep dasar matematika yang penting untuk kehidupan sehari-hari.',
                'category_id' => 1,
                'body' => '<p><strong>Matematika adalah dasar dari ilmu pengetahuan.</strong> Dalam pelajaran ini, Anda akan belajar operasi aritmatika, aljabar dasar, dan geometri. Semua materi dirancang agar mudah dipahami.</p>',
                'user_id' => 2,
                'course_code' => Str::upper(Str::random(6)),
            ],
            [
                'title' => 'Bahasa Indonesia',
                'slug' => 'bahasa-indonesia',
                'description' => 'Pahami tata bahasa dan keterampilan menulis dalam bahasa Indonesia.',
                'category_id' => 2,
                'body' => '<p><strong>Bahasa adalah kunci komunikasi.</strong> Dalam kursus ini, Anda akan mempelajari struktur kalimat, tanda baca, dan cara menulis esai yang baik. Latihan praktis akan membantu memperkuat pemahaman Anda.</p>',
                'user_id' => 2,
                'course_code' => Str::upper(Str::random(6)),
            ],
            [
                'title' => 'Sejarah Dunia',
                'slug' => 'sejarah-dunia',
                'description' => 'Jelajahi peristiwa penting yang membentuk dunia kita saat ini.',
                'category_id' => 3,
                'body' => '<p><strong>Sejarah membantu kita memahami masa kini.</strong> Anda akan mempelajari peradaban kuno, revolusi industri, dan konflik dunia modern. Materi disertai dengan kronologi untuk memudahkan pemahaman.</p>',
                'user_id' => 2,
                'course_code' => Str::upper(Str::random(6)),
            ],
            [
                'title' => 'Membuat Website dengan HTML untuk Pemula',
                'slug' => 'membuat-website-dengan-html-untuk-pemula',
                'description' => 'Pelajari dasar-dasar pengembangan website dengan menggunakan HTML.',
                'category_id' => 4,
                'body' => '<p><strong>Pemrograman Website adalah keterampilan yang sangat dibutuhkan.</strong> Kursus ini mengajarkan Anda tentang sintaks HTML, hingga cara membuat website sederhana.</p><p>Dengan latihan langsung, Anda akan dapat membangun website anda sendiri dengan mudah.</p><p>Berikut adalah video tutorial:</p><iframe width="560" height="315" src="https://www.youtube.com/embed/1WF50180LOU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
                'user_id' => 2,
                'course_code' => Str::upper(Str::random(6)),
            ],
            [
                'title' => 'Seni dan Kreativitas',
                'slug' => 'seni-dan-kreativitas',
                'description' => 'Eksplorasi seni rupa, musik, dan kreativitas.',
                'category_id' => 5,
                'body' => '<p><strong>Seni adalah ekspresi jiwa.</strong> Dalam pelajaran ini, Anda akan belajar menggambar dasar, memahami warna, dan bahkan menciptakan karya seni digital sederhana. Kursus ini dirancang untuk mengasah kreativitas Anda.</p>',
                'user_id' => 2,
                'course_code' => Str::upper(Str::random(6)),
            ],
            [
                'title' => 'Ilmu Pengetahuan Alam',
                'slug' => 'ilmu-pengetahuan-alam',
                'description' => 'Pahami dasar-dasar fisika, kimia, dan biologi.',
                'category_id' => 6,
                'body' => '<p><strong>Alam adalah laboratorium besar.</strong> Dalam pelajaran ini, Anda akan mempelajari hukum-hukum dasar fisika, unsur-unsur kimia, dan mekanisme kehidupan dalam biologi. Setiap materi dilengkapi dengan eksperimen sederhana untuk memperkuat pemahaman.</p>',
                'user_id' => 2,
                'course_code' => Str::upper(Str::random(6)),
            ],
            [
                'title' => 'Dasar-Dasar CSS',
                'slug' => 'dasar-dasar-css',
                'description' => 'Pengenalan tentang CSS.',
                'category_id' => 7,
                'body' => '<p><strong>CSS (Cascading Style Sheets)</strong> adalah bahasa yang digunakan untuk mendesain dan memformat tampilan halaman web. Dengan CSS, Anda dapat mengatur warna, font, layout, dan elemen-elemen visual lainnya di website.</p><p>Dalam kursus ini, Anda akan mempelajari dasar-dasar CSS, seperti selector, properti, dan cara menerapkan gaya pada elemen HTML.</p><p>Berikut adalah video tutorial tentang dasar-dasar CSS:</p><iframe width="560" height="315" src="https://www.youtube.com/embed/ASlNu0nj1Ks" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
                'user_id' => 2,
                'course_code' => Str::upper(Str::random(6)),
            ],
            [
                'title' => 'Ekonomi Dasar',
                'slug' => 'ekonomi-dasar',
                'description' => 'Pelajari prinsip-prinsip dasar ekonomi seperti permintaan dan penawaran.',
                'category_id' => 8,
                'body' => '<p><strong>Ekonomi adalah tentang pengelolaan sumber daya.</strong> Anda akan memahami konsep dasar seperti inflasi, pasar, dan pengambilan keputusan ekonomi.</p>',
                'user_id' => 2,
                'course_code' => Str::upper(Str::random(6)),
            ],
            [
                'title' => 'Kewarganegaraan',
                'slug' => 'kewarganegaraan',
                'description' => 'Pelajari tentang hak dan kewajiban sebagai warga negara.',
                'category_id' => 9,
                'body' => '<p><strong>Memahami peran kita sebagai warga negara.</strong> Kursus ini mencakup konstitusi, nilai-nilai demokrasi, dan pentingnya partisipasi aktif dalam masyarakat.</p>',
                'user_id' => 2,
                'course_code' => Str::upper(Str::random(6)),
            ],
            [
                'title' => 'Geografi',
                'slug' => 'geografi',
                'description' => 'Pahami fenomena alam dan hubungan manusia dengan lingkungannya.',
                'category_id' => 10,
                'body' => '<p><strong>Geografi membantu memahami dunia kita.</strong> Anda akan mempelajari peta, ekosistem, dan dampak lingkungan manusia.</p>',
                'user_id' => 2,
                'course_code' => Str::upper(Str::random(6)),
            ],
            [
                'title' => 'Fisika Dasar',
                'slug' => 'fisika-dasar',
                'description' => 'Pelajari prinsip dasar fisika seperti hukum Newton dan energi.',
                'category_id' => 11,
                'body' => '<p><strong>Fisika menjelaskan fenomena alam.</strong> Anda akan memahami konsep seperti gerak, gaya, dan energi melalui penjelasan teori dan eksperimen.</p>',
                'user_id' => 2,
                'course_code' => Str::upper(Str::random(6)),
            ],
            [
                'title' => 'Kimia Dasar',
                'slug' => 'kimia-dasar',
                'description' => 'Pelajari elemen kimia dan reaksi dasar yang sering dijumpai.',
                'category_id' => 12,
                'body' => '<p><strong>Kimia adalah dasar untuk memahami materi.</strong> Kursus ini membahas struktur atom, tabel periodik, dan reaksi kimia sederhana.</p>',
                'user_id' => 2,
                'course_code' => Str::upper(Str::random(6)),
            ],
            [
                'title' => 'Biologi Dasar',
                'slug' => 'biologi-dasar',
                'description' => 'Pahami kehidupan dari skala mikroskopis hingga makhluk hidup kompleks.',
                'category_id' => 13,
                'body' => '<p><strong>Biologi mempelajari kehidupan.</strong> Anda akan belajar tentang sel, genetika, dan ekologi.</p>',
                'user_id' => 2,
                'course_code' => Str::upper(Str::random(6)),
            ],
            [
                'title' => 'Pemrograman Lanjutan',
                'slug' => 'pemrograman-lanjutan',
                'description' => 'Tingkatkan kemampuan coding dengan struktur data dan algoritma.',
                'category_id' => 14,
                'body' => '<p><strong>Tingkatkan keterampilan coding Anda.</strong> Kursus ini membahas algoritma kompleks, pemrograman berorientasi objek, dan pengoptimalan kode.</p>',
                'user_id' => 2,
                'course_code' => Str::upper(Str::random(6)),
            ],
            [
                'title' => 'Teknologi Informasi',
                'slug' => 'teknologi-informasi',
                'description' => 'Eksplorasi dasar teknologi informasi dan komunikasi.',
                'category_id' => 15,
                'body' => '<p><strong>Teknologi Informasi adalah tulang punggung modernisasi.</strong> Kursus ini mencakup jaringan komputer, keamanan informasi, dan penggunaan perangkat lunak produktivitas.</p>',
                'user_id' => 2,
                'course_code' => Str::upper(Str::random(6)),
            ],
            [
                'title' => 'Keterampilan Hidup',
                'slug' => 'keterampilan-hidup',
                'description' => 'Pelajari keterampilan praktis untuk kehidupan sehari-hari.',
                'category_id' => 16,
                'body' => '<p><strong>Keterampilan hidup yang penting.</strong> Dari mengatur keuangan hingga keterampilan komunikasi, kursus ini dirancang untuk meningkatkan kualitas hidup Anda.</p>',
                'user_id' => 2,
                'course_code' => Str::upper(Str::random(6)),
            ],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}
