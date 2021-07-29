<?php

namespace App\Models\Owner;

use App\Models\Business;
use App\Models\Owner;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'stars', 'content', 'business_id'];

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

    public function business(){
        return $this->belongsTo(Business::class);
    }
}
