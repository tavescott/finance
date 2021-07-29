<?php

namespace Database\Seeders;

use App\Models\Admin\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Duka la Rejareja'],
            ['name' => 'Duka la Dawa'],
            ['name' => 'Saluni'],
            ['name' => 'Stationary'],
            ['name' => 'Mama Lishe'],
            ['name' => 'Mjasiriamali mdogo'],
            ['name' => 'Grocery/Kiosk'],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(['name' => $category['name']], $category);
        }
    }
}
