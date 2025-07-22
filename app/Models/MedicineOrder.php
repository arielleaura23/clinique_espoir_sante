<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicineOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_price',
        'status',
    ];

    // Une commande appartient à un utilisateur (patient)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Une commande contient plusieurs items
    public function orderItems()
    {
        return $this->hasMany(MedicineOrderItem::class);
    }
}
