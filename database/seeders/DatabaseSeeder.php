<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            PlanSeeder::class,
            CategorySeeder::class,
            UserSeeder::class,
            OwnerSeeder::class,
            BusinessSeeder::class,
            UnitSeeder::class,
            CommonExpenseSeeder::class,
        ]);
    }
}
