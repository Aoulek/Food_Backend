<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrier extends Model
{
    use HasFactory;
    protected $fillable = [
        'carriertNumber',
    ];

    public function order()
    {
        return $this->hasOne('App\Models\Order');
    }
}
