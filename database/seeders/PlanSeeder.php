<?php

namespace Database\Seeders;

use App\Models\Admin\Plan;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plans = [
            ['name' => 'Swala', 'no_of_businesses' => 1, 'no_of_users' => 1, 'price' => '500', 'period' => 'Ripoti'],
            ['name' => 'Simba', 'no_of_businesses' => 2, 'no_of_users' => 2, 'price' => '10000', 'period' => 'Mwezi'],
            ['name' => 'Tembo', 'no_of_businesses' => 4, 'no_of_users' => 4, 'price' => '30000', 'period' => 'Mwezi'],
        ];

        foreach ($plans as $plan){
            Plan::updateOrCreate(['name' => $plan['name']], $plan);
        }
    }
}
