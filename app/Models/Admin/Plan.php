<?php

namespace App\Models\Admin;

use App\Models\Business;
use App\Models\Owner;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    public function owners()
    {
        return $this->hasMany(Owner::class);
    }
}
