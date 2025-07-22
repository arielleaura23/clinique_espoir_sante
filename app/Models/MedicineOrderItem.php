<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicineOrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'medicine_order_id',
        'medicine_id',
        'quantity',
        'price',
    ];

    // Un item appartient à une commande
    public function order()
    {
        return $this->belongsTo(MedicineOrder::class, 'medicine_order_id');
    }

    // Un item est lié à un médicament
    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }
}
