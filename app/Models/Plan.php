<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $table = 'plans';

    protected $fillable = [
        'name',
        'icon',
        'price',
        'type',
        'recurrence',
        'description',
        'is_active',
        'mp_plan_id'
    ];

    public $timestamps = false;
}
