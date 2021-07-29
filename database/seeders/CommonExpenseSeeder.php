<?php

namespace Database\Seeders;

use App\Models\CommonExpense;
use Illuminate\Database\Seeder;

class CommonExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $common_expenses = [
            ['name' => 'Kodi'],
            ['name' => 'Umeme'],
            ['name' => 'Maji'],
            ['name' => 'Chakula'],
            ['name' => 'Usafiri'],
            ['name' => 'Dharura'],
            ['name' => 'Matumizi/Nyumbani'],
        ];

        foreach ($common_expenses as $common_expense) {
            CommonExpense::updateOrCreate(['name' => $common_expense['name']], $common_expense);
        }
    }
}
