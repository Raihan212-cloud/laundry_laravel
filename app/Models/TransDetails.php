<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransDetails extends Model
{
    protected $fillable = [
        'id_trans',
        'id_service',
        'qty',
        'subtotal',
        'note'
    ];
}
