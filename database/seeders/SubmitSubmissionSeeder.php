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
                'body' => 'Berikut adalah tugas yang saya kerjakan. Saya telah mengikuti semua instruksi dan berhasil mengimplementasikan fitur yang diminta dengan baik. Mohon beri tahu jika ada perubahan yang perlu dilakukan!',
                'user_id' => 3,
                'grade' => 90
            ]
        );
        
        SubmitSubmission::create(
            [
                'submission_id' => 2,
                'body' => 'Saya telah menyelesaikan tugas ini, namun saya tidak yakin apakah saya melakukannya dengan benar. Saya akan sangat menghargai jika ada umpan balik untuk membantu saya memahami konsep ini lebih baik.',
                'user_id' => 4,
                'grade' => 60
            ]
        );
        
        SubmitSubmission::create(
            [
                'submission_id' => 2,
                'body' => 'Saya sudah berusaha semaksimal mungkin untuk menyelesaikan tugas ini. Beberapa bagian terasa sulit, tetapi saya sangat mengharapkan umpan balik untuk membantu saya memperbaiki pekerjaan saya di masa depan.',
                'user_id' => 3,
            ]        
        );
    }
}
