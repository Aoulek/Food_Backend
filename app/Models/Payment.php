<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'datePayment',
        'prixTotal',
        'rédaction',
        'prix_products',
        'prix_laivraison'
    ];

    public function order()
    {
        return $this->hasOne('App\Models\Order');
    }

}
