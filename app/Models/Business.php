<?php

namespace App\Models;

use App\Models\Admin\Plan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $guarded = [];
//    protected $fillable = [
//        'owner_id',
//        'name',
//        'category_id',
//        'product_type',
//        'plan_id',
//        'ward_region',
//        'b_id_type',
//        'b_id_no',
//    ];

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
