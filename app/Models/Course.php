<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'user_id',
        'description',
        'body',
    ];

    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function submission()
    {
        return $this->hasMany(Submission::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'course_users', 'course_id', 'user_id');
    }
    
    // public function discussion()
    // {
    //     return $this->hasMany(Discussion::class);
    // }
}
