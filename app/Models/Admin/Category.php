<?php

namespace App\Models\Admin;

use App\Models\Business;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function businesses()
    {
        return $this->hasMany(Business::class);
    }

    protected $fillable = ['name'];
}
