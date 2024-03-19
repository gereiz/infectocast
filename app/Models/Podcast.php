<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Podcast extends Model
{
    use HasFactory;

    public $table = 'podcasts';

    protected $fillable = [
        'title',
        'link',
        'id_user'
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
