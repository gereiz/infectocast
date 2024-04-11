<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public $table = 'payments';

    protected $fillable = [
        'id_client',
        'order_number',
        'order_status',
        'order_value',
        'payment_method',
    ];
}
