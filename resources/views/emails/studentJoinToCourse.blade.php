@component('mail::message')
# Halo, {{ $data['teacher_name'] }}

Siswa berikut telah bergabung di kelas Anda:

@component('mail::panel')
**Nama Siswa:** {{ $data['student_name'] }}  
**Kelas:** {{ $data['course_name'] }}  
@endcomponent

Terima kasih,<br>
{{ config('app.name') }}
@endcomponent
