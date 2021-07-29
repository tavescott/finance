<?php

namespace Database\Seeders;

use App\Models\Owner;
use Illuminate\Database\Seeder;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $owners = [
            ['user_id' => 2, 'plan_id' => 2, 'first_name' => 'Raphael', 'last_name' => 'Olomi'],
        ];
        foreach ($owners as $owner){
            Owner::updateOrCreate(['user_id' => $owner['user_id']], $owner);
        }
    }
}
