<?php

namespace App\Models\Admin;

use App\Models\Expense;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}
