<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subcategory;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'id_subcategory',
        'id_user'
    ];

    protected $casts = [
        'plan_id' => 'array'
    ];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'id_subcategory');
    }
}
