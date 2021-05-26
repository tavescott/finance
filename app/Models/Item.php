<?php

namespace App\Models;

use App\Models\Admin\Unit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_id',
        'name',
        'unit_id',
        'unit_price',
        'mini_unit_id',
        'mini_unit_price',
        'divisible_further',
        'mini_unit_in_unit',
        'unit_quantity',
        'mini_unit_quantity',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    public function sales()
    {
        return $this->hasMany(Purchase::class);
    }



    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
    public function mini_unit()
    {
        return $this->belongsTo(Unit::class, 'mini_unit_id');
    }

}
