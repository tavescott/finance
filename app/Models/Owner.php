<?php

namespace App\Models;

use App\Models\Admin\Plan;
use App\Models\Owner\Testimonial;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'plan_id',
        'middle_name',
        'last_name',
        'gender',
        'birth_date',
        'ward_region',
        'id_type',
        'id_number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function business()
    {
        return $this->hasMany(Business::class);
    }

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }
}
