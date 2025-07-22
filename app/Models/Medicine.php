<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'image',
        'dosage',
        'expiration_date',
        'form',
        'manufacturer',
        'instructions',
    ];

    protected $casts = [
        'expiration_date' => 'date',
        'price' => 'decimal:2',
    ];

    // Un médicament peut apparaître dans plusieurs items de commande
    public function orderItems()
    {
        return $this->hasMany(MedicineOrderItem::class);
    }

    // Un médicament peut appartenir à une catégorie
        public function category()
    {
        return $this->belongsTo(MedicineCategory::class);
    }
}
