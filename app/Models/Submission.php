<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'title',
        'description',
        'deadline',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function submit_submission()
    {
        return $this->hasMany(SubmitSubmission::class);
    }
}
