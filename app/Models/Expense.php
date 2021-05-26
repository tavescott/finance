<?php

namespace App\Models;

use App\Models\Admin\Unit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_id',
        'date',
        'common_expense_id',
        'name',
        'amount',
        'unit_id',
        'multiplier',
        'number_of_days',
        'description',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    public function common_expense()
    {
        return $this->belongsTo(CommonExpense::class, 'common_expense_id');
    }


}
