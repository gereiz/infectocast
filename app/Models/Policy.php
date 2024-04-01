<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    use HasFactory;

    protected $table = 'privacy_policies';

    protected $fillable = [
        'title',
        'content',
        'is_active'
    ];

    public $timestamps = false;

    
}
