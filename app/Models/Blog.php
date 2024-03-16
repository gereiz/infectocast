<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blog_posts';

    protected $fillable = [
        'title',
        'content',
        'author',
        'date',
        'status',
        'order'
    ];

    public function authorPost()
    {
        return $this->belongsTo(User::class, 'author');
    }
}
