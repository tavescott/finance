<?php

namespace Database\Seeders;

use App\Models\Admin\Unit;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $units = [
           ['name' => 'Kreti', 'level' => '1',],
           ['name' => 'Chupa', 'level' => '2',],
           ['name' => 'Mfuko', 'level' => '1',],
           ['name' => 'Kilo', 'level' => '2',],
           ['name' => 'Box', 'level' => '1',],
           ['name' => 'Dozen', 'level' => '1',],
           ['name' => 'Ndoo', 'level' => '1',],
           ['name' => 'Lita', 'level' => '2',],
           ['name' => 'Lita', 'level' => '2',],
           ['name' => 'Robo', 'level' => '3', 'value' => 0.25],
           ['name' => 'Nusu', 'level' => '3', 'value' => 0.50],
           ['name' => 'Robo Tatu', 'level' => '3', 'value' => 0.75],
           ['name' => 'Siku', 'level' => '10', 'value' => 1],
           ['name' => 'Wiki', 'level' => '10', 'value' => 7],
           ['name' => 'Mwezi/Miezi', 'level' => '10', 'value' => 30],
           ['name' => 'Mwaka/Miaka', 'level' => '10', 'value' => 365],
       ];

        foreach ($units as $unit) {
            Unit::updateOrCreate(['name' => $unit['name']], $unit);
       }
    }
}
