<?php

namespace Database\Seeders;

use App\Models\Business;
use Illuminate\Database\Seeder;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $businesses = [
            ['name' => 'Business One', 'owner_id' => 1, 'category_id' => 1, 'sales_type' => 'Items', 'record_type' => 'Each', 'stock_taking' => 1, 'credit_allowed' => 'No'],
        ];
        foreach ($businesses as $business){
            Business::updateOrCreate(['name' => $business['name']], $business);
        }
    }
}
