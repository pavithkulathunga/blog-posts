<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    // Fields that can be mass-assigned
    protected $fillable = [
        'title',
        'body',
        'user_id',
    ];

    // A post belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
{
    return $this->hasMany(Comment::class);
}
}
