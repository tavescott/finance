<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_id',
        'date',
        'item_id',
        'supplier',
        'payment_type',
        'unit_quantity',
        'mini_unit_quantity',
        'cash_amount',
        'credit_amount',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
