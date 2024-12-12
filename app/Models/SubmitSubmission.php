<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubmitSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'submission_id',
        'file',
        'body',
        'user_id',
    ];

    public function submission()
    {
        return $this->belongsTo(Submission::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
